<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ExamResult;
use Faker\Generator as Faker;

$factory->define(ExamResult::class, function (Faker $faker) {

	$total_true_answer = floor(random_int(6, 10));
	$total_wrong_answer = 10 - $total_true_answer;
	$score = $total_true_answer * 10;
	
    return [
        'exam_id' => factory(App\Exam::class),
        'total_true_answer' => $total_true_answer,
        'total_wrong_answer' => $total_wrong_answer,
        'score' => $score,
        'user_id' => 1
    ];
});
