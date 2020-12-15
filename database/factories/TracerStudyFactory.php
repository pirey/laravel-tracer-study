<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TracerStudy;
use Faker\Generator as Faker;

$factory->define(TracerStudy::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'currently_working' => true,
        'occupation' => $faker->jobTitle
    ];
});
