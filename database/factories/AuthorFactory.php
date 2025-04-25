<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'birth_year' => $this->faker->numberBetween(1800, 2000),
            'birth_place' => $this->faker->city,
            'bio' => $this->faker->paragraph,
        ];
    }
}
