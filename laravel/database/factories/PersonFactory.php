<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sidi' => fake()->date(),
            'nikah_by' => fake()->name(),
            'nikah_date' => fake()->date(),
            'passed_date' => fake()->date(),
            'parrent' => fake()->name(),
            'spouse' => fake()->name(),
            'nia' => rand(11111, 9999),
            'from' => fake()->name(),
            'to' => fake()->name(),
            'note' => fake()->realText(300),
        ];
    }
}
