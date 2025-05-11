<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
public function store(Request $request)
{
    // Validate the request
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);

    // Check if the user is authenticated and add user_id to the validated data
    if (Auth::check()) {
        $validated['user_id'] = Auth::id();
    }

    // Store the contact message in the database
    ContactMessage::create($validated);

    // Redirect back with a success message
    return back()->with('success', 'Votre message a été envoyé avec succès !');
}

}
