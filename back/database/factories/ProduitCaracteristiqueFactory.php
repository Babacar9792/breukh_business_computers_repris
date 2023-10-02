<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProduitCaracteristique>
 */
class ProduitCaracteristiqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "valeur" => fake()->colorName(),
            "unite_id" => rand(1,3),
            "caracteristique_id" => rand(1,3),
            "produit_id" => rand(1,100) 
            //
        ];
    }
}
