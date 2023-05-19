<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Client::factory()->count(10)->create()->each(
            function ($client){
                Commande::factory()->count(5)->create(
                  [ 'client_id' => $client->id ])->each(
                        function ($commande){
                            $produits = Produit::factory()->count(rand(1, 5))->create();
                            foreach ($produits as $produit) {
                                $commande->produits()->attach($produit, [
                                    'quantite' => rand(1, 10),
                                    'prix' => rand(10, 100),
                                ]);
                            }
                        }
                );
            }
        );
        
    }
}
