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
        // return $this->belongsToMany(Produit::class);
        return $this->belongsToMany(Produit::class, 'commande_produit')
            ->withPivot('quantite', 'prix');
    }
}
