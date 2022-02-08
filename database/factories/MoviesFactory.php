<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MoviesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'desc' => 'this is a description',
            'price' => 10,
            'rented' => 0
        ];
    }
}
