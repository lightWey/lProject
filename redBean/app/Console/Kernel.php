<?php

namespace App\Console;

use App\Ad;
use App\AdSchema;
use App\AdStat;
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
            $schemas = Redis::keys('sch_*');
            if (empty($schemas)) {
                return false;
            }

            //sch_调度id_广告id_类型_价格_开始时间
            foreach ($schemas as $schema) {
                $ex = explode('_', $schema);

                if ($ex[5] <= time()) {
                    // 调度中。。。 的逻辑
                    if (isset($ex[6])) {
                        unset($ex[6]);
                        $oldSchema = $schema;
                        $schema = implode('_', $ex);
                        Redis::rename($oldSchema, $schema);
                        $adSchema = AdSchema::find($ex[1]);
                        $adSchema->status = 2;
                        $adSchema->save();
                    }

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
                            $ad->used += $ex[4] * $key;
                        }
                        $ad->save();

                        if (empty(Redis::exists($schema))) {
                            $adSchema = AdSchema::with('ad.user')->find($ex[1]);
                            $adSchema->status = 3;
                            $adSchema->save();
                            $amount = 0 - ($ex[4] * $adSchema->total);
                            $adSchema->ad->user->recharge()->create([
                                'admin' => 1,
                                'type' => 2,
                                'amount'=> $amount
                            ]);
                            $coin = $adSchema->ad->user->info->coin;
                            $adSchema->ad->user->info->coin = $coin + $amount;
                            $adSchema->ad->user->info->save();
                            Redis::del($schema);
                        }

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
