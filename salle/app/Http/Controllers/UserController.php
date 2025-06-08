<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Coache;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('roles', compact('users'));
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:admin,user,coach',
        ]);
    
        $user = User::findOrFail($request->user_id);
        $user->role = $request->role;
        $user->save();
    
        if ($request->role === 'coach') {
            Coache::firstOrCreate(
                ['email' => $user->email],
                ['nom_complet' => $user->name]
            );
        }
    
        return redirect()->route('admin.users.index')->with('success', 'Role updated!');
    }

}
