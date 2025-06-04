<?php

namespace App\Http\Controllers\member;

use App\Models\Member;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');

        $members = Member::with(['membership'])
            ->where(function ($query) use ($search) {
                $query->where('nom_complet', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->orWhere('expiration_date', 'like', "%$search%")
                        ->orWhereHas('membership', function ($q) use ($search) {
                            $q->where('name', 'like', "%$search%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $memberships = Membership::all();

        return view('member.list-member', compact('members', 'search', 'memberships'));
    }
    public function update(Request $request, $id){

        $members = Member::findOrFail($id);

        $request -> validate([
            'nom_complet' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:membres,email,' . $id,
            'expiration_date' => 'required|date',  
            'membership_id' => 'required|string|max:255',
        ]);

        $members -> update($request->all());

        return redirect()->route('list-membre')->with('success', 'Membre est modifier avec succes');
    }

    public function edit($id){

        $members = Member::findOrFail($id);
        $memberships = Membership::all();

        return view('member.modifier-member', compact('members', 'memberships'));
    }

    public function destroy($id){
        $members = Member::findOrFail($id);
        $members->delete();
        return redirect()->route('list-membre')->with('succes', 'Membre est supprimer avec succes');
    }
}