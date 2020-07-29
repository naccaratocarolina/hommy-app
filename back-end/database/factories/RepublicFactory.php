<?php

use App\Republic;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Republic::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'address' => $faker->address
    ];
});
