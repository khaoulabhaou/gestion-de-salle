@extends('layouts.app')

@section('title', 'Détails de l\'abonnement')

@section('content')
<div class="main-banner mt-5" id="top">
    <div class="video-overlay header-text"></div>
</div>
<section class="py-5 bg-light">
    <div class="container">
        <div class="mx-auto bg-white shadow rounded-4 p-5" style="max-width: 700px;">
            <h2 class="mb-4 text-center fw-bold">Détails de l'abonnement</h2>

            @if($user->member && $user->member->abonnement_actif && $latestPayment && $latestPayment->membership)
                <div class="mb-3 d-flex justify-content-between">
                    <h5 class="fw-semibold">Type :</h5>
                    <p>{{ $latestPayment->membership->name }}</p>
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <h5 class="fw-semibold">Description :</h5>
                    <p>{{ $latestPayment->membership->description }}</p>
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <h5 class="fw-semibold">Prix :</h5>
                    <p>{{ $latestPayment->membership->price }} MRU</p>
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <h5 class="fw-semibold">Durée :</h5>
                    <p>{{ $latestPayment->membership->duration }} mois</p>
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <h5 class="fw-semibold">Date de paiement :</h5>
                    <p>{{ $latestPayment->created_at->format('d M Y') }}</p>
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <h5 class="fw-semibold">Méthode :</h5>
                    <p>{{ ucfirst($latestPayment->methode) }}</p>
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <h5 class="fw-semibold">Expire le :</h5>
                    <p>{{ $membershipEndDate->format('d M Y') }}</p>
                </div>

                <div class="mb-4 d-flex justify-content-between">
                    <h5 class="fw-semibold">Temps restant :</h5>
                    <p>
                        @php $daysLeft = now()->diffInDays($membershipEndDate, false); @endphp
                        @if ($daysLeft > 0)
                            {{ ceil($daysLeft) }} {{ ceil($daysLeft) === 1 ? 'jour restant' : 'jours restants' }}
                        @else
                            Abonnement expiré
                        @endif
                    </p>
                </div>

                <div class="d-flex justify-content-between gap-3">
                    <a class="w-50" href="{{ route('membership.upgrade') }}">
                        <button class="btn w-100 text-white" style="background-color: #ed563b">Améliorer</button>
                    </a>
                    <a class="w-50" href="{{ route('membership.cancel') }}">
                        <button class="btn btn-outline-danger w-100">Annuler</button>
                    </a>
                </div>
            @else
                <p class="text-center fs-5">Aucun abonnement actif</p>
                <div class="text-center mt-4">
                    <a href="{{ route('membership') }}" class="btn text-white" style="background-color: #ed563b">Devenir membre</a>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
