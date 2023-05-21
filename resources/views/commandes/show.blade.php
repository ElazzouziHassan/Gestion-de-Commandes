@extends('commandes.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Commande</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Produit : {{ $commandes }}</h5>
        <p class="card-text">Quantité	 : {{ $commandes }}</p>
        <p class="card-text">Prix : {{ $commandes }}</p>
        <p class="card-text">Date de commande : {{ $commandes }}</p>
  </div>
    </hr>
  </div>
</div>