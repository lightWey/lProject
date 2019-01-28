<?php

namespace App\Console;

use App\AdSchema;
use App\AdStat;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

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
            $adSchema = AdSchema::where('status', 1)->with('ad.user')->first();
            if (empty($adSchema)) {
                return false;
            }
            $adSchema->status = 2;
            $adSchema->save();
            $sctime = strtotime($adSchema->ctime);
            $setime = strtotime($adSchema->etime);

            $cha = $setime - $sctime; //差值
            if ($adSchema->random == 1) {
                $int = ceil($adSchema->total / $cha);

                for ($i=$sctime;$i<$setime;$i++) {
                    $interval = date('Y-m-d H:i:s', $i);
                    $adSchema->stat()->saveMany(factory(AdStat::class, $int)->make([
                        'ad_id'=>$adSchema->ad->id,
                        'cons' => $adSchema->ad->once,
                        'type' => $adSchema->type,
                        'created_at' => $interval,
                        'updated_at' => $interval,
                        'real' => 0
                    ]));
                    $adSchema->ad->user->recharge()->create([
                        'admin' => 1,
                        'type' => 2,
                        'amount'=> 0 - ($adSchema->ad->once * $int)
                    ]);
                }
            } else {
                $test = 0;
                while (true) {
                    if ($test >= $adSchema->total) {
                        break;
                    }
                    $time = date('Y-m-d H:i:s', mt_rand($sctime, $setime));
                    $adSchema->stat()->save(factory(AdStat::class)->make([
                        'ad_id'=>$adSchema->ad->id,
                        'cons' => $adSchema->ad->once,
                        'type' => $adSchema->type,
                        'created_at' => $time,
                        'updated_at' => $time,
                        'real' => 0
                    ]));
                    $adSchema->ad->user->recharge()->create([
                        'admin' => 1,
                        'type' => 2,
                        'amount'=> 0 - $adSchema->ad->once
                    ]);
                    $test+=1;
                }
            }
            $adSchema->status = 3;
            $adSchema->save();
            $adSchema->ad->user->info->coin += (0 - $adSchema->total * $adSchema->ad->once);
            $adSchema->ad->user->info->save();
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
