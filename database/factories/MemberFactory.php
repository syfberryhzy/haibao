<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Member::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'gender' => rand(1,2),
        'avatar' => $faker->imgUrl(200, 200),
        'openid' => str_random(10)
    ];
});
