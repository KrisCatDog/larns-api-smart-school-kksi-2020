<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'classroom_id' => factory(App\Classroom::class),
        'user_id' => factory(App\User::class),
        'title' => $faker->realText(10),
        'description' => $faker->realText(20)
    ];
});
