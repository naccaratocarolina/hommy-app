
<?php

use App\Comment;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->text
    ];
});
