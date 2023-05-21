@extends('commandes.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Commande</div>
  <div class="card-body">
       
      <form action="{{ url('commandes') }}" method="post">
        {!! csrf_field() !!}
        <h2>create commande</h2><br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop