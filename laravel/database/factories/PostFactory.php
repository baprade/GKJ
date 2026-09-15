<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $h1 = fake()->realText(80);

        return [
            'id_format' => rand(2, 4),
            'h1' => $h1,
            'slug' => Str::slug($h1),
            'h2' => fake()->realText(150),
            'belly' => fake()->realTextBetween(1000, 2000),
        ];
    }
}
