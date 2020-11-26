<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ClassVideo;
use Faker\Generator as Faker;

$factory->define(ClassVideo::class, function (Faker $faker) {
    return [            
        'title' => $faker->name,
        'description' => $faker->realText(110),
        'attachment_video' => $faker->name . '.mp4',
        'classroom_id' => factory(App\Classroom::class)
    ];
});
