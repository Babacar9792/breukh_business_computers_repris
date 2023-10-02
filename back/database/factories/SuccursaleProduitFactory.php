<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuccursaleProduit>
 */
class SuccursaleProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "prix" => rand(1000,10000),
            "stock" => rand(0, 50),
            "produit_id" => rand(1,100),
            "succursale_id" => rand(1,10)
            //
        ];
    }
}
