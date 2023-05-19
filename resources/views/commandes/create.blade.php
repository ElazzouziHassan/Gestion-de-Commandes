@extends('commandes.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Commande</div>
  <div class="card-body">
       
      <form action="{{ url('commandes') }}" method="post">
        {!! csrf_field() !!}
        <label>Date de la commande</label></br>
        <input type="datetime-local" name="date" id="date" class="form-control"></br>
        <label for="cars">choisir le client qui effectue la commande </label></br>
        <select name="client-id" id="client-id" class="form-control">
        @foreach($commandes as $item)
            <option value={{ $item->client_id }} name="client-id" id="client-id">{{ $item->client->nom }}</option>
        @endforeach
        </select></br></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop