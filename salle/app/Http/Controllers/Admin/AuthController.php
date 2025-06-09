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
     
         // 👇 If new role is admin and not already in admins table
         if ($request->role === 'admin' && !Admin::where('email', $user->email)->exists()) {
             Admin::create([
                 'name' => $user->name,
                 'email' => $user->email,
                 'password' => $user->password, // assuming it's already hashed in users table
             ]);
         }
     
         return back()->with('success', 'User role updated successfully.');
    }

}