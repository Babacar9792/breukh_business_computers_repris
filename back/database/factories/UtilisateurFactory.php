<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilisateur>
 */
class UtilisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "prenom" => fake()->firstName(),
            "nom" => fake()->lastName(),
            "telephone" => fake()->phoneNumber(),
            "email" => fake()->email(),
            "password" => '123',
            "succursale_id" => rand(1,10)
             //
        ];
    }
}
