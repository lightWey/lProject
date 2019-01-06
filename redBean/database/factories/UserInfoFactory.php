<?php

use Faker\Generator as Faker;

$factory->define(App\UserInfo::class, function (Faker $faker) {
    return [
        'qq' => $faker->numberBetween(10000,1000000000000),
        'wechat' => $faker->unique()->firstName,
        'remark' => $faker->text(100),
        'name' => $faker->unique()->firstName,
        'coin' => $faker->numberBetween(0,2000)
    ];
});
