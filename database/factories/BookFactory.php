<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'author_id' => $this->faker->numberBetween(1, 10),
            'category_id' => $this->faker->numberBetween(1, 10),
            'publisher_id' => $this->faker->numberBetween(1, 10),
            'pages' => $this->faker->numberBetween(100, 1000),
            'language' => $this->faker->languageCode,
            'isbn' => $this->faker->isbn13,
            'available' => $this->faker->boolean,
            'description' => $this->faker->paragraph,
        ];
    }
}
