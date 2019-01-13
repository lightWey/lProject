<?php

use Faker\Generator as Faker;

$factory->define(App\AdStat::class, function (Faker $faker) {
    return [
        'type' => $faker->numberBetween(1,2),
        'cons' => 0.1,
        'referer' => $faker->url,
        'ip' => $faker->ipv4,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
