<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\QuestionSubanswer;
use Faker\Generator as Faker;

$factory->define(QuestionSubanswer::class, function (Faker $faker) {
    return [
        'subanswer' => $faker->realText(300),
        'question_answer_id' => factory(App\QuestionAnswer::class),
        'user_id' => factory(App\User::class)
    ];
});
