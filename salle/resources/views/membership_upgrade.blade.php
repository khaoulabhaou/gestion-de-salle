@extends('layouts.app')

@section('title', 'Gestion de votre abonnement')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text"></div>
</div>

<div class="profile-container mb-5" style="margin-top: 8rem; max-width: 900px; margin-left: auto; margin-right: auto; padding: 0 20px;">
    <h1 style="text-align:center; color: #333; margin-bottom: 2rem;">Gérer votre abonnement</h1>

    @if(session('success')) 
        <div class="alert alert-success">{{ session('success') }}</div> 
    @endif

    <div class="card shadow-sm p-4 mb-4">
        @if($user->subscription_active)
            <!-- Mise à niveau de l'abonnement -->
            <h3 class="mb-4"><i class="fas fa-arrow-up me-2 text-primary"></i>Améliorer votre abonnement</h3>

            <form action="{{ route('membership.upgrade') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="membership" class="form-label">Choisissez un nouveau forfait</label>
                    <select name="membership_id" id="membership" class="form-select mt-2 p-3">
                        @foreach($memberships as $membership)
                            <option value="{{ $membership->id }}" {{ $user->membership_id === $membership->id ? 'selected' : '' }}>
                                {{ $membership->name }} - {{ $membership->price }}MRU (Durée: {{ $membership->duration }} mois)
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn text-white mt-3 w-100 p-3" style="background-color: #ed563b; font-weight: 600;"
                        onmouseover="this.style.backgroundColor='#d04a2b'" 
                        onmouseout="this.style.backgroundColor='#ed563b'">
                    <i class="fas fa-arrow-up me-2"></i>Améliorer mon abonnement
                </button>
            </form>

            <hr class="my-4">

            <!-- Annulation d'abonnement -->
            <h3 class="mb-4"><i class="fas fa-exclamation-triangle me-2 text-danger"></i>Résilier votre abonnement</h3>
            <div class="alert alert-warning mb-4">
                <i class="fas fa-info-circle me-2"></i>
                La résiliation prendra effet immédiatement et vous perdrez l'accès à vos avantages.
            </div>
            
            <form action="{{ route('membership.cancel.submit') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger p-3 w-100">
                    <i class="fas fa-ban me-2"></i>Oui, résilier mon abonnement
                </button>
            </form>

        @else
            <!-- Souscription à un abonnement -->
            <h3 class="mb-4"><i class="fas fa-plus-circle me-2 text-secondary"></i>Souscrire à un abonnement</h3>

            <form action="{{ route('membership.subscribe') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="membership" class="form-label">Choisissez un forfait</label>
                    <select name="membership_id" id="membership" class="form-select mt-2 p-3">
                        @foreach($memberships as $membership)
                            <option value="{{ $membership->id }}">
                                {{ $membership->name }} - {{ $membership->price }}MRU (Durée: {{ $membership->duration }} mois)
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn text-white mt-3 w-100 p-3" style="background-color: #ed563b; font-weight: 600;"
                        onmouseover="this.style.backgroundColor='#d04a2b'" 
                        onmouseout="this.style.backgroundColor='#ed563b'">
                    <i class="fas fa-check me-2"></i>Souscrire maintenant
                </button>
            </form>
        @endif
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('profile.edit') }}" class="text-decoration-none text-secondary">
            <i class="fas fa-arrow-left me-2"></i>Retour au profil
        </a>
    </div>
</div>

<style>
    .profile-container {
        font-family: 'Roboto', sans-serif;
    }
    .form-select, .form-control {
        border-radius: 8px;
        border: 1px solid #ddd;
    }
    .alert-warning {
        background-color: #fff3cd;
        border-left: 4px solid #ffc107;
    }
    .btn {
        transition: all 0.3s ease;
    }
    .card {
        border-radius: 12px;
    }
</style>

<script src="/js/profile.js"></script>
@endsection