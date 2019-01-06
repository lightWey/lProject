<?php

use Faker\Generator as Faker;

$factory->define(App\AdStat::class, function (Faker $faker) {
    $num = $faker->numberBetween(1,10);
    return [
        'num' => $num,
        'type' => $faker->numberBetween(1,2),
        'cons' => $num * 0.1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
