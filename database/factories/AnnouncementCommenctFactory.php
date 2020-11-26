<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AnnouncementComment;
use Faker\Generator as Faker;

$factory->define(AnnouncementComment::class, function (Faker $faker) {
    return [
    	'announcement_id' => factory(App\Announcement::class),
    	'user_id' => factory(App\User::class),
    	'comment' => $faker->realText(random_int(30, 100))
    ];
});
