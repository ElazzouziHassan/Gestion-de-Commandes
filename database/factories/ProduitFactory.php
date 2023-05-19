<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Libelle'=>$this->faker->sentence(3),
            'Couleur'=>$this->faker->colorName(),
            'prix'=>$this->faker->randomFloat(2, 2, 1000),
            'QteStk'=>$this->faker->numberBetween(2, 100),
        ];
    }
}
