<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# CRUD Laravel : Gestion Des Commandes

Objectif : Créer une application de gestion de commandes en utilisant Laravel et une base de 
données MySQL.

## 1 - Création de le projet 

```git
composer create-project laravel/laravel gestion_commande
```
## 2 - Configuration de la base de données

- sous le fichier `.env`
```git
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_commande_db
DB_USERNAME=root
DB_PASSWORD=
```
# Commande Controller
```git
php artisan make:controller CommandeController
```
app/Http/Controllers/CommandeController.php


```php
<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::paginate(10);
        return view ('commandes.index')->with('commandes', $commandes);
    }
    

    public function create()
    {
        $commandes = Commande::paginate(10);
        return view('commandes.create')->with('commandes', $commandes);
    }

    public function store(Request $request)
    {
        $request->validate([
            
        ]);
        Commande::create($request->all());
        return redirect('commandes.index')->with('success', 'Commande Added!');
    }

    public function edit(string $id)
    {
        $commande = Commande::find($id);
        return view('commandes.edit');
    }

    public function update(Request $request, string $id)
    {
        $commande = Commande::find($id);
        $input = $request->all();
        $commande->update($input);
        return redirect('commande')->with('flash_message', 'Commande Updated!'); 
    }

    public function destroy(string $id)
    {
        Commande::destroy($id);
        return redirect('commande')->with('flash_message', 'Commande deleted!');
    }
}
```
# les routes:
routes/web.php
```php
use App\Http\Controllers\CommandeController;

Route::group([], function () {
    Route::get('/', [CommandeController::class, 'index']);
    Route::get('/commandes/create', [CommandeController::class, 'create']);
    Route::post('/commande', [CommandeController::class, 'store']);
    Route::get('/commandes/{commande}/edit', [CommandeController::class, 'edit']);
    Route::put('/commandes/{commande}', [CommandeController::class, 'update']);
    Route::delete('/commandes/{commande}', [CommandeController::class, 'destroy']);
});
```
## 3 - Création des modèles Eloquent pour chacune des tables

- Pour la table `Client`
```git
php artisan make:model Client
```

app/Models/Client.php :

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Commande;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'prenom', 'ville'];

    public function Commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
```


- Pour la table `Commande`
```git
php artisan make:model Commande
```
app/Models/Commande.php :
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Produit;

class Commande extends Model
{
    use HasFactory;
    protected $table = 'commandes';
    protected $primaryKey = 'id';
    protected $fillable = [ 'client_id' ];

    public function Clients()
    {
        return $this->belongsTo(Client::class);
    }

    public function Produits()
    {
        return $this->belongsToMany(Produit::class);
    }
}
```

- Pour la table `CommandeProduit`
```git
php artisan make:model CommandeProduit
```
app/Models/CommandeProduit.php :
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends Model
{
    use HasFactory;
    protected $table = 'commande_produit';
    protected $fillable = ['quantite', 'prix' , 'commande_id', 'produit_id' ];
}
```

- Pour la table `Produit`
```git
php artisan make:model Produit
```
app/Models/Produit.php :

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Commande;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produits';
    protected $primaryKey = 'id';
    protected $fillable = ['Libelle', 'Couleur', 'Prix' , 'QteStk'];
    public function Commandes()
    {
        return $this->belongsToMany(Commande::class);
    }
}
```

## 4 - Migration:
- pour la table clients:

```git
php artisan make:migration create_clients_table
```
database/migrations/2023_05_15_141816_create_clients_table.php:
```php
 public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('ville');
            $table->timestamps();
        });
    }
```

- pour la table Produits
```git
php artisan make:migration create_produits_table
```
database/migrations/2023_05_15_141825_create_produits_table.php:

```php
public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('Libelle');
            $table->string('Couleur');
            $table->double('Prix');
            $table->integer('QteStk');
            $table->timestamps();
        });
```
- pour la table commandes:

```git
php artisan make:migration create_commandes_table
```
database/migrations/2023_05_15_141849_create_commandes_table.php
```php
public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }
```
- pour la table commande_produit:
```git
php artisan make:migration create_commande_produit_table
```
database/migrations 2023_05_15_141907_create_commande_produit_table.php
```php
public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('commande_produit', function (Blueprint $table) {
            $table->primary(['produit_id', 'commande_id']);
            $table->integer('quantite');
            $table->float('prix');
            $table->timestamps();
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
            $table->unsignedBigInteger('commande_id');
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
        });
    }
```

## 5 - Factories :

```git 
php artisan make:factory ClientFactory
```
database/factories/ClientFactory.php
```php
public function definition(): array
    {
        return [
            'Nom'=>$this->faker->lastName(),
            'Prenom'=>$this->faker->firstName(),
            'ville'=>$this->faker->city(),
        ];
    }
```

```git 
php artisan make:factory CommandeFactory
```
database/factories/CommandeFactory.php
```php
 public function definition(): array
    {
        return [
            'client_id'=>Client::factory(),
        ];
    }
```

```git 
php artisan make:factory ProduitFactory
```
database/factories/ProduitFactory.php
```php
 public function definition(): array
    {
        return [
            'Libelle'=>$this->faker->sentence(3),
            'Couleur'=>$this->faker->colorName(),
            'prix'=>$this->faker->randomFloat(2, 2, 1000),
            'QteStk'=>$this->faker->numberBetween(2, 100),
        ];
    }
```

```git 
php artisan make:factory CommandeProduitFactory
```
database/factories/CommandeProduitFactory.php
```php
public function definition(): array
    {
        return [
            'commande_id'=>Commande::factory(),
            'produit_id'=>Produit::factory(),
            'quantite'=>$this->faker->randomNumber(),
            'prix'=>$this->faker->randomFloat(),
        ];
    }
```

## 6 - seeders

database/seeders/DatabaseSeeder.php

```php
use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;


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
```

## 8 - migrate
```git
php artisan migrate:fresh
 
php artisan migrate:fresh --seed
```
