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
