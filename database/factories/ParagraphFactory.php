<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Paragraph::class, function (Faker $faker) {
    return [
        'title' => $faker->title(),
        'author' => $faker->name(),
        'value' => $faker->text(),
        'status' => $faker->randomElement(['0', '1']),
    ];
});
