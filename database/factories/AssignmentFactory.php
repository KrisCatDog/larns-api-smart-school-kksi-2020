<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Assignment;

$factory->define(Assignment::class, function (Faker $faker) {
    return [
        'classroom_id' => factory(App\Classroom::class),
        'user_id' => factory(App\User::class),
        'name' => $faker->name,
        'description' => $faker->realText(110)
    ];
});
