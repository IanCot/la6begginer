<?php

namespace Database\Factories;

use App\Voivodeship;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoivodeshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voivodeship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->state, // In Polish context, 'state' might not be ideal but it's a placeholder
        ];
    }
}
