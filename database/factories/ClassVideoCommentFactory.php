<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ClassVideoComment;
use Faker\Generator as Faker;

$factory->define(ClassVideoComment::class, function (Faker $faker) {
    return [
        'comment' => $faker->realText(10),
        'class_video_id' => factory(App\ClassVideo::class),
        'user_id' => factory(App\User::class)
    ];
});
