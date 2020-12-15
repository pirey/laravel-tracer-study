<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TracerStudy;
use Faker\Generator as Faker;

$factory->define(TracerStudy::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'program_study' => $faker->word,
        'graduation_year' => strval($faker->randomNumber(4)),
        'currently_working' => true,
        'occupation' => $faker->jobTitle
    ];
});
