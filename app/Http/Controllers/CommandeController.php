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
