<?php

use Faker\Generator as Faker;

$once = [0.02,0.2];
$factory->define(App\Ad::class, function (Faker $faker) use($once) {
    return [
        'status' => $faker->numberBetween(0,1),
        'type' => $faker->numberBetween(0,1),
        'once' => $once[array_rand($once, 1)],
        'used' =>$faker->numberBetween(1,99),
        'url' => $faker->url,
        'name' => $faker->title,
        'remark' => $faker->realText(10),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')

    ];
});