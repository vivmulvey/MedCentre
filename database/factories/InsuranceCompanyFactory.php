<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InsuranceCompany;
use Faker\Generator as Faker;


$factory->define(InsuranceCompany::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'address' => $faker->address,
        'post_code' =>$faker->postcode,
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->email
    ];
});
