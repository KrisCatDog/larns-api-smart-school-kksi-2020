<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ExamQuestion;
use Faker\Generator as Faker;

$factory->define(ExamQuestion::class, function (Faker $faker) {
    return [
        'question' => $faker->realText(20) . '?',
        'true_answer' => $faker->text(5),
        'exam_id' => factory(App\Exam::class)  
   	];
});
