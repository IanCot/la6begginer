<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Voivodeship;
use Faker\Generator as Faker;

$factory->define(Voivodeship::class, function (Faker $faker) {
    return [
        'name'=>$faker->state
    ];
});
