<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)
            ->create()
            ->each(function($u) {
                $u->info()->save(factory(App\UserInfo::class)->make());
                $u->ad()->saveMany(factory(App\Ad::class, 10)->make());
                foreach ($u->ad as $ad) {
                    $ad->stat()->saveMany(factory(App\AdStat::class, 15)->make());
                }
            });
    }
}
