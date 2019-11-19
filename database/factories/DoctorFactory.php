<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Doctor;
use Faker\Generator as Faker;

$factory->define(Doctor::class, function (Faker $faker) {
    return [
        'start_date' => $faker->date($format = 'Y-m-d' , $max = 'now'),
        'expertise' => $faker->jobTitle

    ];
});
