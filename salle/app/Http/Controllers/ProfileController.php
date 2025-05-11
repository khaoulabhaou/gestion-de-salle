<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
public function edit()
{
    $user = Auth::user()->load('member'); // Load the member relationship

    // Check if the user has a membership
    $hasMembership = $user->member ? true : false;

    return view('profile.edit', compact('user', 'hasMembership'));
}

public function update(Request $request)
{
    $user = Auth::user();

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'nullable|string|max:20',
        'dob' => 'nullable|date',
        'gender' => 'nullable|string',
        'address' => 'nullable|string|max:255',
        'goal' => 'nullable|string|max:255',
        'pfp' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('pfp')) {
        $data['pfp'] = $request->file('pfp')->store('profile_pictures', 'public');
    }

    $user->update($data);
    return redirect()->route('profile.edit')->with('success', 'Profile updated!');
}

}