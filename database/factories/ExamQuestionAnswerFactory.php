<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ExamQuestionAnswer;
use Faker\Generator as Faker;

$factory->define(ExamQuestionAnswer::class, function (Faker $faker) {
    return [
	    'exam_question_id' => factory(App\ExamQuestion::class),
	    'answer_identifier' => $faker->text(5),
	    'answer' => $faker->realText(20) . '.',
	    'answer_image' => $faker->word . '.jpg'            
    ];
});
