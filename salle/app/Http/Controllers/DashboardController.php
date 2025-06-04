<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coache;
use App\Models\Cour;
use App\Models\Member;
use App\Models\Membership;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMembres = Member::count();
        $totalCoaches = Coache::count();
        $totalCours = Cour::count();
        $totalAbonnements = Membership::count();
    
        return view('adminDashboard', compact('totalMembres', 'totalCoaches', 'totalCours', 'totalAbonnements'));
    }

}
