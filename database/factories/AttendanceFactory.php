<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attendance;
use Faker\Generator as Faker;

$factory->define(Attendance::class, function (Faker $faker) {
    return [
        'classroom_id' => factory(App\Classroom::class),
        'user_id' => factory(App\User::class),
        'started_at' => '2026-11-19 09:33:43',
        'ended_at' => '2030-11-19 09:33:43'
    ];
});
