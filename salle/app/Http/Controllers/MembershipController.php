<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Paiement;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();
        return view('membership', compact('memberships'));
    }

    public function showPaymentPage($membershipId)
    {
        $membership = Membership::findOrFail($membershipId);
    
        // Check if the user already has an active membership
        $user = auth()->user();
        $existingMember = Member::where('email', $user->email)
                                ->where('abonnement_actif', true)
                                ->first();
    
        if ($existingMember) {
            return redirect()->route('membership')->with('error', 'You already have an active membership.');
        }
    
        // Redirect to the PaymentController to show payment page
        return redirect()->route('payment.show', ['membership' => $membership->id]);
    }
    

    public function subscribe(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
    
        $request->validate([
            'membership_id' => 'required|exists:memberships,id',
        ]);
    
        $user = auth()->user();
        $membership = Membership::findOrFail($request->membership_id);
    
        // Check if the user already has an active membership
        $existingMember = Member::where('email', $user->email)
                                ->where('abonnement_actif', true)
                                ->first();
    
        if ($existingMember) {
            return redirect()->route('membership')->with('error', 'You already have an active membership.');
        }
    
        // Create or update the member
        $member = Member::firstOrCreate(
            ['email' => $user->email],
            [
                'nom_complet' => $user->name,
                'mot_de_passe' => bcrypt('defaultpassword'),
                'abonnement_actif' => true,
                'membership_id' => $membership->id,
            ]
        );
    
        $expirationDate = now()->addMonths($membership->duration);
        $member->update(['expiration_date' => $expirationDate]);
    
        // Record the payment
        $member->paiements()->create([
            'montant' => $membership->price,
            'methode' => 'cash', // Replace with payment method from request if needed
        ]);
    
        return redirect()->route('membership')->with('success', 'You are now a member!');
    }
    
}
