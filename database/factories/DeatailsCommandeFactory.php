<?php

namespace Database\Factories;

use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DeatailsCommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'commande_id'=>Commande::factory(),
            'produit_id'=>Produit::factory(),
            'quantite'=>$this->faker->randomNumber(),
        ];
    }
}
