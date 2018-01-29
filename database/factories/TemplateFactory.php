<?php

use Faker\Generator as Faker;
use App\Models\Template;

$factory->define(App\Models\Template::class, function (Faker $faker) {
    return [
        'body_image' => '/images/templete.png',
        'status' => 1
    ];
});
