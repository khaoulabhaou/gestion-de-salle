<?php

namespace App\Http\Controllers\member;

use App\Models\Member;
use App\Models\Category;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function create(){

        $members = Member::all();
        $categories = Category::all();
        $memberships = Membership::all();

        return view('member.ajouter-member', compact('members', 'categories', 'memberships'));
    }

    public function store(Request $request){
        $request -> validate([
            
        ]);
    }

    public function edit(Request $request, $id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}