<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function updateRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:user,coach,admin',
        ]);
    
        $user = User::findOrFail($request->user_id);
        $user->role = $request->role;
        $user->save();
    
        return back()->with('success', 'Role updated successfully.');
    }

}