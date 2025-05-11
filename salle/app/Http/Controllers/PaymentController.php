<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Member;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Display payment page with membership details
    public function show(Membership $membership)
    {
        return view('payment', compact('membership'));
    }    public function processPayment(Request $request, Membership $membership)
    {
        // Check if the user already has an active membership
        $user = auth()->user();
        $existingMember = Member::where('email', $user->email)
                                ->where('abonnement_actif', true)
                                ->first();
    
        if ($existingMember) {
            return redirect()->route('membership')->with('error', 'Vous avez déjà un abonnement actif.');
        }
    
        // Validate payment method
        $request->validate([
            'payment_method' => 'required|in:cash,card', // Example validation
        ]);
    
        // Process the payment (for now, let's assume it's always successful)
        // Create or update the member
        $member = Member::firstOrCreate(
            ['email' => $user->email], 
            [
                'nom_complet' => $user->name,
                'mot_de_passe' => bcrypt('defaultpassword'),
                'abonnement_actif' => true,
                'membership_id' => $membership->id,
                'user_id' => $user->id,
            ]
        );
    
        // Set expiration date based on membership duration
        $expirationDate = now()->addMonths($membership->duration);
    
        // Update the member with the expiration date
        $member->update(['expiration_date' => $expirationDate]);
    
        // Add the payment entry
        $member->paiements()->create([
            'montant' => $membership->price,
            'methode' => $request->payment_method,
            'membership_id' => $membership->id,  // Save the membership_id in the payment record
        ]);
    
        // Redirect to a success page
        return redirect()->route('membership')->with('success', 'Vous êtes maintenant membre!');
    }
    
    
}