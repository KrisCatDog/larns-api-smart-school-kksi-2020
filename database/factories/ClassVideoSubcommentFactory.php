<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ClassVideoSubcomment;
use Faker\Generator as Faker;

$factory->define(ClassVideoSubcomment::class, function (Faker $faker) {
    return [
        'subcomment' => $faker->realText(30),
        'class_video_comment_id' => factory(App\ClassVideoComment::class),
        'user_id' => factory(App\User::class)
    ];
});
