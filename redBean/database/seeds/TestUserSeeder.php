<?php

use Illuminate\Database\Seeder;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s');
        DB::table('users')->insert([
            'name' => 'lightWay',
            'email' => 'zhiwei@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('user_infos')->insert([
            'name' => '张三',
            'user_id' => 1,
            'remark' => '重要客户',
            'created_at' => $date,
            'updated_at' => $date
        ]);
        $u = \App\User::first();
        $u->ad()->save(factory(App\Ad::class)->make());
    }
}
