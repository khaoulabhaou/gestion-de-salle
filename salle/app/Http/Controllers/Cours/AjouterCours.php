<?php

namespace App\Http\Controllers\Cours;

use App\Models\Cour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coache;

class AjouterCours extends Controller
{
    public function store(Request $request){

        // dd($request->all());
        $request -> validate([
            'titre' => 'required|string|max:255|unique:cours,titre',
            'description' => 'nullable|string',
            'duree' => 'required|integer|min:1|max:90',
            'capacite_max' => 'required|integer|min:1|max:30',
            'catégorie' => 'required|string',
            'coach_id' => 'required|exists:coaches,id',
            'statut' => 'required|in:PLANIFIE,EN_COURS,TERMINE,ANNULE'
        ], [
            'titre.unique' => 'Ce titre est déjà utilisé pour un autre cours.',
            'duree.max' => 'La durée ne peut pas durer plus de 90 minutes',
            'capacite_max.max' => 'La capacite ne peut être qu\'environ 1 et 30',
            'capacite_max.min' => 'La capacite ne peut être qu\'environ 1 et 30',
        ]);

        Cour::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'duree' => $request->duree,
            'capacite_max' => $request->capacite_max,
            'catégorie' => $request->catégorie,            
            'coach_id' => $request->coach_id,
            'statut' => $request->statut,
        ]);

        return redirect()->route('ajouter-cour')->with('success', 'Le cours a été ajouté avec succès.');
    }

    public function create(){
        $coaches = Coache::all();
        return view('cours.ajouter-cour', compact('coaches'));
    }

}