<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsCommande extends Model
{
    use HasFactory;
    protected $table = 'détails_commandes';
    protected $fillable = ['quantite', 'prix' , 'commande_id', 'produit_id' ];
}
