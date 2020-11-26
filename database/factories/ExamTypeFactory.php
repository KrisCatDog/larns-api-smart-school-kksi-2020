<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ExamType;
use Faker\Generator as Faker;

$factory->define(ExamType::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
