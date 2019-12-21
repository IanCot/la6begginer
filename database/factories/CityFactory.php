<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\Voivodeship;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name'=>$faker->city,
        'postcode'=>$faker->postcode,
        'voivodeship'=>factory(Voivodeship::class)
    ];
});
