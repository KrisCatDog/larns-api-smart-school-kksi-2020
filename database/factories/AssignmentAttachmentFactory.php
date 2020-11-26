<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AssignmentAttachment;
use Faker\Generator as Faker;

$factory->define(AssignmentAttachment::class, function (Faker $faker) {
    return [
        'assignment_id' => factory(App\Assignment::class),
        'attachment_file' => $faker->text(15) . '.docx'
    ];
});
