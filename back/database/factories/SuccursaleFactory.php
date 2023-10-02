<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Succursale>
 */
class SuccursaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom" => fake()->name(),
            "email" => fake()->email(),
            "telephone" => fake()->phoneNumber(),
            "adresse" => fake()->address() 
            //
        ];
    }
}
