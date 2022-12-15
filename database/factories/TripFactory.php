<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'car_id' => $this->faker->numberBetween(1,10),
            'miles' => $this->faker->numberBetween(5,100),
            'date' => $this->faker->dateTimeBetween('-3 years',date('Y-m-d')),
        ];
    }
}
