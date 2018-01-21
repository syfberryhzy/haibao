<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Gallery::class, function (Faker $faker) {
    return [
        'title' => $faker->title(),
        'value' => $faker->imageUrl(200, 180),
        'description' => $faker->text(),
        'status' => $faker->randomElement(['0', '1']),
    ];
});
