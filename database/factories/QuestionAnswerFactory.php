<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\QuestionAnswer;
use Faker\Generator as Faker;

$factory->define(QuestionAnswer::class, function (Faker $faker) {
    return [
        'question_id' => factory(App\Question::class),
        'user_id' => factory(App\User::class),
        'answer' => $faker->realText(30)
    ];
});
