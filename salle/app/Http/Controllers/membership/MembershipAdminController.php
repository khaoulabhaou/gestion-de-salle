<?php

namespace App\Http\Controllers\membership;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipAdminController extends Controller
{
    public function index(){
        $memberships = Membership::all();
        return view('membership.membership-list', compact('memberships'));
    }

    public function create(){
        $memberships = Membership::all();
        return view('membership.membership-ajouter', compact('memberships'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        Membership::create($request->all());

        return redirect()->route('list-membership')->with('success', 'Cours supprimé avec succès!');

    }

    public function destroy($id){
        $membership = Membership::findOrFail($id);
        $membership->delete();
        
        return redirect()->route('list-membership')->with('success', 'Abonnoment supprimé avec succès!');

    }

    public function edit($id){

        $memberships = Membership::findOrFail($id);

        return view('membership.membership-modifier', compact('memberships'));
    }

    public function update($id, Request $request){

        $membership = Membership::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
        ]);   

        $membership->update($request->all());

        return redirect()->route('list-membership')->with('success', 'Abonnoment supprimé avec succès!');
    }
}
