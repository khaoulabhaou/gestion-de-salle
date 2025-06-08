<?php

namespace App\Http\Controllers;

use App\Models\Coache;
use App\Models\Cour;
use App\Models\Member;
use App\Models\User;
use App\Models\Planning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoachePageController extends Controller
{
    public function index()
    {
        // Get logged-in coach
        $coach = Auth::user();

        // Total courses by this coach
        $coursCoach = Cour::where('coach_id', $coach->id)->count();

        // Total planned sessions (seances) by this coach
        $seancesPlanifiees = Planning::where('coache_id', $coach->id)->count();

        // Pass data to the Blade
        return view('coacheDashboard', compact('coursCoach', 'seancesPlanifiees'));
    }

    public function voirCours()
    {
        $cours = Cour::where('coach_id', auth()->id())->get();
        return view('coachePanel.cours', compact('cours'));
    }

    public function planningHebdo()
    {
        $coache = Coache::where('user_id', auth()->id())->with('plannings.cour')->first();
    
        $plannings = $coache ? $coache->plannings->sortBy('heure_debut') : collect();
    
        return view('coachePanel.planning', compact('plannings'));
    }


    public function listeMembres()
    {
        $coache = Coache::where('user_id', auth()->id())->first();
        $membres = $coache ? $coache->membres : collect();
        return view('coachePanel.membreslist', compact('membres'));
    }
}