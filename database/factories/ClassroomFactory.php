<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Classroom;
use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

$factory->define(Classroom::class, function (Faker $faker) {
    return [
        'uuid' => Uuid::uuid4(),
        'join_code' => Str::random(6),
        'user_id' => factory(App\User::class),
        'name' => $faker->company,
        'grade' => $faker->buildingNumber,
        'major' => $faker->state
    ];
});
