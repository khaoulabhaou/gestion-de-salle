<?php

namespace App\Http\Controllers\Cours;

use App\Models\Cour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coache;
use Livewire\Attributes\Validate;

class Listscontroller extends Controller
{
    public function show($id){
        $courses = Cour::findOrFail($id);
        return view('list-cours', compact('courses'));
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $courses = Cour::with(['category', 'coach'])
            ->where(function ($query) use ($search) {
                $query->where('titre', 'like', "%$search%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('nom', 'like', "%$search%");
                    })
                    ->orWhere('duree', 'like', "%$search%")
                    ->orWhere('capacite_max', 'like', "%$search%")
                    ->orWhereHas('coach', function ($q) use ($search) {
                        $q->where('nom_complet', 'like', "%$search%");
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    
        return view('cours.list-cours', compact('courses', 'search'));
    }


    public function edit($id){
        $course = Cour::findOrFail($id);
        $coaches = Coache::all( );
        $categories = Category::all();
        return view('cours.modifier-cour', compact('course', 'coaches', 'categories'));
    }

    public function update($id, Request $request){

        $course = Cour::findOrFail($id);

        $request ->validate([
            'titre' => 'required',
            'category_id' => 'required',
            'duree' => 'required|numeric',
            'capacite_max' => 'required|numeric',
            'statut' => 'required|in:PLANIFIE,EN_COURS,TERMINE,ANNULE',
            'coach_id' => 'required|exists:coaches,id',
        ]);

        $course -> update($request->all());

        return redirect()->route('list-cours')->with('success', 'Cours mis à jour avec succès');
    }

    public function destroy($id){
        
        $cours = Cour::findOrFail($id);
        $cours->delete();

        return redirect()->route('list-cours')->with('success', 'Cours supprimé avec succès!');
    }
}
