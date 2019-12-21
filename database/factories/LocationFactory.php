<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Location;
use App\City;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
        'name'=>$faker->streetAddress,
        'city_id'=>factory(City::class)
    ];
});
