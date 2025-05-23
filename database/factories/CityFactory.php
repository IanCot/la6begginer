<?php

namespace Database\Factories;

use App\City;
use App\Voivodeship;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker; // Faker is usually available via $this->faker in new factories

class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city,
            'postcode' => $this->faker->postcode,
            'voivodeship_id' => Voivodeship::factory(),
            // The 'county' field is missing, which causes the NOT NULL constraint violation.
            // I'll add a placeholder for now. This should be reviewed for actual data requirements.
            'county' => $this->faker->word, 
        ];
    }
}
