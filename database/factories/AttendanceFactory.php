<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attendance;
use Faker\Generator as Faker;

$factory->define(Attendance::class, function (Faker $faker) {
    return [
        'classroom_id' => factory(App\Classroom::class),
        'user_id' => factory(App\User::class),
        'started_at' => now()->format('H:i'),
        'ended_at' => now()->format('H:i')
    ];
});
