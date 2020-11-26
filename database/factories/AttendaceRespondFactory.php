<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AttendanceRespond;
use Faker\Generator as Faker;

$factory->define(AttendanceRespond::class, function (Faker $faker) {
    return [
       'status' => $faker->word,
       'attendance_id' => factory(App\Attendance::class),
       'user_id' => 1
    ];
});
