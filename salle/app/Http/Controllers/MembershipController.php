<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Member;
use App\Models\Paiement;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = auth()->user();
        $existingMember = Member::where('email', $user->email)
                                ->where('abonnement_actif', true)
                                ->first();

        if ($existingMember) {
            return redirect()->route('membership')->with('error', 'Vous avez déjà un abonnement actif.');
        }

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

        $member = Member::where('user_id', $user->id)->first();

        if (!$member) {
            $member = Member::create([
                'email' => $user->email,
                'nom_complet' => $user->name,
                'mot_de_passe' => bcrypt('defaultpassword'),
                'abonnement_actif' => true,
                'membership_id' => $membership->id,
                'expiration_date' => now()->addMonths($membership->duration),
                'user_id' => $user->id,
            ]);
        } else {
            $member->update([
                'abonnement_actif' => true,
                'membership_id' => $membership->id,
                'expiration_date' => now()->addMonths($membership->duration),
            ]);
        }

        $member->paiements()->create([
            'membership_id' => $membership->id,
            'montant' => $membership->price,
            'methode' => 'cash',
        ]);

        $message = $member->wasRecentlyCreated
            ? '🎉 Félicitations ! Vous êtes maintenant membre.'
            : '🔁 Votre abonnement a été activé ou mis à jour.';

        return redirect()->route('profile.edit')->with('success', $message);
    }

    public function upgradeMembership()
    {
        $user = auth()->user();
        $memberships = Membership::all();
        return view('membership_upgrade', compact('user', 'memberships'));
    }

    public function upgradeMembershipSubmit(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'membership_id' => 'required|exists:memberships,id',
        ]);

        $member = Member::where('user_id', $user->id)->first();
        $newMembership = Membership::findOrFail($request->membership_id);

        if (!$member) {
            return redirect()->route('profile.edit')->with('error', 'Aucun membre trouvé.');
        }

        if ($member->membership_id == $newMembership->id && $member->abonnement_actif) {
            return redirect()->route('profile.edit')->with('success', 'Vous avez déjà ce plan actif.');
        }

        $member->update([
            'membership_id' => $newMembership->id,
            'abonnement_actif' => true,
            'expiration_date' => now()->addMonths($newMembership->duration),
        ]);

        $member->paiements()->create([
            'membership_id' => $newMembership->id,
            'montant' => $newMembership->price,
            'methode' => 'cash',
        ]);

        return redirect()->route('profile.edit')->with('success', 'Abonnement mis à niveau avec succès !');
    }

    public function cancelMembership()
    {
        $user = auth()->user();
        return view('membership_cancel', compact('user'));
    }

    public function cancelMembershipSubmit()
    {
        $user = auth()->user();
        $member = Member::where('user_id', $user->id)->first();
    
        if ($member) {
            // Transfer to cancelled_memberships table
            \DB::table('cancelled_memberships')->insert([
                'user_id' => $user->id,
                'membership_id' => $member->membership_id,
                'cancellation_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // Now delete the member from the membres table
            $member->delete();
        }
    
        return redirect()->route('profile.edit')->with('success', 'Abonnement annulé et votre compte a été supprimé.');
    }

public function showMembershipInfo()
{
    $user = Auth::user()->load('member');  // Load the member relationship

    // Check if the user has a membership
    if ($user->member) {
        $latestPayment = $user->member->paiements()->latest()->first();
        $membershipEndDate = Carbon::parse($user->member->expiration_date);  // Ensure it's a Carbon instance

        // Calculate the remaining days for the membership
        $daysLeft = now()->diffInDays($membershipEndDate, false);
    } else {
        // If no member, set $latestPayment and $membershipEndDate to null
        $latestPayment = null;
        $membershipEndDate = null;
        $daysLeft = null;
    }

    // Pass the data to the view
    return view('membershipdetails', compact('user', 'latestPayment', 'membershipEndDate', 'daysLeft'));
}

}