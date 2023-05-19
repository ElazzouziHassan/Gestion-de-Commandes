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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Produit::factory()->count(15)->create();
        Client::factory()
        ->has(Commande::factory()->count(4))
        ->count(8)->hasAttached(Produit::factory()
        ->count(rand(1,15)),['quantite'=>rand(1,15),'prix'=>rand(5,20)])->create();
    }
}
