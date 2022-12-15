<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'make' => $this->faker->text(10).rand(1,100),
            'model' => $this->faker->text(8),
            'year' => $this->faker->numberBetween(2018,date("Y")),
        ];
    }
}
