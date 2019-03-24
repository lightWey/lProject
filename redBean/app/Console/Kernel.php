<?php

namespace App\Console;

use App\Ad;
use App\AdSchema;
use App\Consume;
use App\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//         $schedule->command('inspire')
//                  ->hourly();
        $schedule->call(function () {
            $all = User::where('type', 0)->withCount(['ad as ad_used' => function ($query) {
                $query->select(DB::raw("sum(used) as ad_sum"));
            }, 'ad as ad_click' => function ($query) {
                $query->select(DB::raw("sum(click) as ad_click"));
            }, 'ad as ad_show' => function ($query) {
                $query->select(DB::raw("sum(`show`) as `ad_show`"));
            }])->get();

            $yesterday =  strtotime('yesterday');
            $day = strtotime('today');

            if (empty($all)) {
                return false;
            }

            foreach ($all as $v) {
                $consume = Consume::where('user_id', $v->id)->where('day', $yesterday)->first();

                $click = $show = $count = 0;
                if ($consume) {
                    $click = $consume->click;
                    $show = $consume->show;
                    $count =$consume->count;
                }
                Consume::create([
                    'day' => $day,
                    'user_id' => $v->id,
                    'show' => $v->ad_show - $show,
                    'click' => $v->ad_click - $click,
                    'count' => $v->ad_used - $count
                ]);
            }
        })->daily();

        $schedule->call(function () {
            $schemas = Redis::keys('sch_*');
            if (empty($schemas)) {
                return false;
            }

            foreach ($schemas as $schema) {
                $ex = explode('_', $schema);
                if ($ex[5] <= time()) {
                    if (isset($ex[6])) {
                        unset($ex[6]);
                        $oldSchema = $schema;
                        $schema = implode('_', $ex);
                        Redis::rename($oldSchema, $schema);
                        $adSchema = AdSchema::find($ex[1]);
                        $adSchema->status = 2;
                        $adSchema->save();
                    }
                }
            }
        });

        $schedule->call(function () {
            $schemas = Redis::keys('sch_*');
            if (empty($schemas)) {
                return false;
            }
            //sch_调度id_广告id_类型_价格_开始时间
            foreach ($schemas as $schema) {
                $ex = explode('_', $schema);

                if (count($ex) == 6 && $ex[5] <= time()) {
                    $key = Redis::rpop($schema);
                    if ($key) {
                        $ad = Ad::find($ex[2]);
                        if ($ex[3] == 1) {
                            $ad->show += $key;
                        }

                        if ($ex[3] == 2) {
                            $ad->click += $key;
                        }

                        if ($ex[3] == $ad->type) {
                            $num = $ex[4] * $key;
                            $ad->used += $num;
                            $ad->user->info->coin -= $num;
                            $ad->user->info->save();
                        }
                        $ad->save();
                    }

                    if (!Redis::exists($schema)) {
                        $adSchema = AdSchema::find($ex[1]);
                        $adSchema->status = 3;
                        $adSchema->save();
//                            $amount = 0 - ($ex[4] * $adSchema->total);
//                            $adSchema->ad->user->recharge()->create([
//                                'admin' => 1,
//                                'type' => 2,
//                                'amount'=> $amount
//                            ]);
//                            $coin = $adSchema->ad->user->info->coin;
//                            $adSchema->ad->user->info->coin = $coin + $amount;
//                            $adSchema->ad->user->info->save();
                    }
                }
            }


        })->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
