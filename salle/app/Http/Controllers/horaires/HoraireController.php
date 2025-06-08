<?php

namespace App\Http\Controllers\horaires;

use App\Models\Planning;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coache;
use App\Models\Cour;

class HoraireController extends Controller
{
    public function index()
    {
        $plannings = Planning::with('cour', 'coache')->get();
        return view('schedules', compact('plannings'));
    }

    public function indexAdmin()
    {
        $plannings = Planning::with('cour', 'coache')->get();
        return view('horaire.horaireVue', compact('plannings'));
    }

    public function create() {
        $cours = Cour::all();
        $coaches = Coache::all();
        return view('horaire.horaireAjouter',compact('cours','coaches'));
    }
    
    public function store(Request $request) {
        $request->validate([
            'coache_id' => 'required|string|max:255', // fix here too
            'cour_id' => 'required|string|max:255',
            'jour' => 'required|string',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
        ]);

    
        // Save to DB
        Planning::create([
            'coache_id' => $request->coache_id, // not coach_id
            'cour_id' => $request->cour_id,
            'jour' => $request->jour,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
        ]);

    
        return redirect()->route('horaire.index')->with('success', 'Horaire ajouté avec succès !');
    }

    public function edit($id){
        $plannings = Planning::findOrFail($id);
        $cours = Cour::all();
        $coaches = Coache::all();
        return view('horaire.horaireModifie', compact('plannings','cours','coaches'));
    }

    public function update(Request $request, $id){
        $plannings = Planning::findOrFail($id);
        $request->validate([
            'coache_id' => 'required',
            'cour_id' => 'required',
            'jour' => 'required|string',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
        ]);

        $plannings->update([
             'coache_id' => $request->coache_id,
            'cour_id' => $request->cour_id,
            'jour' => $request->jour,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
        ]);

        return redirect()->route('horaire.index', 'Horaire modifier avec succès !');
    }

    public function destroy($id){
        $plannings = Planning::findOrFail($id);
        $plannings->delete();
        return redirect()->route('horaire.index')->with('success', 'Horaire supprimé avec succès !');
    }
}