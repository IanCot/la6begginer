<?php

namespace Database\Factories;

use App\Location;
use App\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->streetAddress,
            'city_id' => City::factory(), // This will use CityFactory
        ];
    }
}
