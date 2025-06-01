<?php

namespace App\Http\Controllers\coache;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coache;

class CoacheController extends Controller
{
    public function create(){

        $coaches = Coache::all();
        $categories = Category::all();

        return view('coache.coache-ajouter', compact('coaches', 'categories'));
    }

    public function index(Request $request){

        $coaches = Coache::all();
        
        $search = $request->input('search');
        $coaches = Coache::with(['category'])
            ->where(function ($query) use ($search) {
                $query->where('nom_complet', 'like', "%$search%")
                    ->orWhereHas('category', function ($q) use ($search) {
                    $q->where('nom', 'like', "%$search%");
                    })
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('categorie', 'like', "%$search%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('coache.coache-list', compact('coaches'));
    }

    public function store(Request $request){
        $request -> validate([
            'nom_complet' => 'required|string|max:255',
            'email' => 'required|unique:coaches,email',
            'categorie' => 'required|string|max:255',
        ],[
            'email.unique' => 'Cet email est déjà utilisé pour un autre entraîneur.'
        ]);

        Coache::create([
            'nom_complet' => $request -> nom_complet,
            'email' => $request -> email,
            'categorie'  => $request -> categorie,
        ]);

        return redirect()->route('coache.create')->with('success', 'L\'entraîneur a été ajouté avec succès.');

    }

    public function destroy($id){

        $coaches = Coache::findOrFail($id);
        $coaches->delete();

        return redirect()->route('coache.index')->with('success','L\'entraîneur a été supprimer avec succes');
    }

    public function edit(Request $request, $id){
        $coaches = Coache::findOrFail($id);
        $categories = Category::all();

        return view('coache.coache-modifier', compact('coaches', 'categories'));
    }

    public function update(Request $request, $id){

        $coaches = Coache::findOrFail($id);

        $request->validate([
            'nom_complet' => 'required|string|max:255',
            'email' => 'required|email|unique:coaches,email,'.$id,
            'categorie' => 'required|string|max:255',
        ]);

        $coaches -> update($request->all());

        return redirect()->route('coache.index')->with('success','L\'entraîneur mis à jour avec succes');
    }
}
