@extends('commandes.layout')
@section('content')
    <div class="container">
        <div class="row" >
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background:#8294C4;">
                        <h2 style="text-align: center">LARAVEL CRUD : GESTION DES COMMANDES</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/commandes/create') }}" class="btn btn-success btn-sm" title="Add New Commande">
                            Ajouter ne commande
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Commande ID</th>
                                        <th>Produit</th>
                                        <th>Quantité</th>
                                        <th>Prix</th>
                                        <th>Date de commande</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($commandes as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->produits[0]->Libelle }}</td>
                                        <td>{{ $item->produits[0]->pivot->quantite }}</td>
                                        <td>{{ $item->produits[0]->pivot->prix }} MAD</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ url('/commande/' . $item->id) }}" title="View commande"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/commande/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
  
                                            <form method="POST" action="{{ url('/commande' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete commande" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-felx justify-content-center">
                            {{ $commandes->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection