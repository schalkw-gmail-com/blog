<?php

use App\Posts;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'body' => $faker->text()
    ];
});
