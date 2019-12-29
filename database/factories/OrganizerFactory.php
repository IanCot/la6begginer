<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Organizer;
use Faker\Generator as Faker;

$factory->define(Organizer::class, function (Faker $faker) {
    return [
        'name'=>$faker->company,
        'representativ'=>$faker->name,
        'email'=>$faker->companyEmail,
        'phone'=>$faker->phone
    ];
});
