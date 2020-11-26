<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AssignmentResult;
use Faker\Generator as Faker;

$factory->define(AssignmentResult::class, function (Faker $faker) {
    return [
        'assignment_id' => factory(App\Assignment::class),
        'user_id' => factory(App\User::class),
        'attachment_file' => $faker->word . '.txt',
        'score' => floor(random_int(10, 100))
    ];
});
