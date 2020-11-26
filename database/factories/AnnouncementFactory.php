<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Announcement;
use Faker\Generator as Faker;

$factory->define(Announcement::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(20),
        'description' => $faker->realText(50),
        'classroom_id' => factory(App\Classroom::class),
        'user_id' => factory(App\User::class)
    ];
});
