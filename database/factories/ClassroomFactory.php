<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Classroom;
use Faker\Generator as Faker;

$factory->define(Classroom::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'name' => $faker->company,
        'grade' => $faker->buildingNumber,
        'major' => $faker->state
    ];
});
