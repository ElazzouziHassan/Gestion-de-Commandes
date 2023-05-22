@extends('commandes.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header" style="background:#8294C4;">Create New Commande</div>
  <div class="card-body">
       
      <form action="{{ url('commandes') }}" method="post">
        {!! csrf_field() !!}
        <label>Date de la commande :</label></br>
        <input type="datetime-local" name="date_commande" id="date_commande" class="form-control"></br>
        <label>Ajouter Produit :</label></br>
        <table class="table">
          <thead>
            <tr>
              <td>Libelle</td>
              <td>Quantite</td>
            </tr>
          </thead>
          <tbody>
            
            <tr>
              <td>
                <select name="produit" id="produit">
                  @foreach($produits as $item)
                  <option value={{ $item->id }}>{{ $item->Libelle }}</option>
                  @endforeach
                </select>
              </td>
              <td><input type="number" name="quantite" id="quantite"></td>
            </tr>
            
          </tbody>
        </table>
        <input type="submit" value="Ajouter" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop