<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exam;
use Faker\Generator as Faker;

$factory->define(Exam::class, function (Faker $faker) {
    return [
	    'name' => $faker->name,
	    'description' => $faker->realText(110),
	    'classroom_id' => factory(App\Classroom::class),
	    'exam_type_id' => factory(App\ExamType::class),
	    'user_id' => factory(App\User::class)
    ];
});
