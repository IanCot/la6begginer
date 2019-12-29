<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Run;
use App\Location;
use Faker\Generator as Faker;

$factory->define(Run::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'description'=>$faker->sentence,
        'distance'=>$faker->numberBetween(1,85).' km',
        'location_id'=>factory(Location::class),
        'start_date'=>$faker->dateTime
    ];
});
