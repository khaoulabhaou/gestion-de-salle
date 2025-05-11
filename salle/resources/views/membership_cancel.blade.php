@extends('layouts.app')

@section('title', 'Annulation d\'Abonnement')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text"></div>
</div>

<div class="profile-container" style="margin-top: 8rem; max-width: 900px; margin-left: auto; margin-right: auto; padding: 0 20px;">
    <h1 style="text-align:center; color: #333; margin-bottom: 2rem;">Annuler Votre Abonnement</h1>

    @if(session('success')) 
        <div class="alert alert-success">{{ session('success') }}</div> 
    @endif

    <div class="card shadow-sm p-4">
        <p class="mb-4" style="font-size: 1.1rem; line-height: 1.6;">
            Êtes-vous sûr de vouloir résilier votre abonnement ? Cette action est irréversible et vous perdrez immédiatement l'accès à tous vos avantages actuels.
        </p>
        
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle me-2"></i>
            Votre accès aux cours et équipements premium sera immédiatement suspendu.
        </div>

        <div class="row text-center mt-5 mb-3">
            <div class="col-md-6 mb-3">
                <form action="{{ route('membership.cancel.submit') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger p-3 w-100" style="font-weight: 600;">
                        <i class="fas fa-ban me-2"></i>Oui, Résilier Mon Abonnement
                    </button>
                </form>
            </div>
            <div class="col-md-6 mb-3">
                <a href="{{ route('profile.edit') }}" class="btn text-white w-100 p-3" 
                   style="background-color: #ed563b; font-weight: 600;"
                   onmouseover="this.style.backgroundColor='#d04a2b'" 
                   onmouseout="this.style.backgroundColor='#ed563b'">
                    <i class="fas fa-arrow-left me-2"></i>Non, Garder Mon Abonnement
                </a>
            </div>
        </div>

        <p class="text-muted small mt-4">
            <i class="fas fa-info-circle me-2"></i>
            Pour toute question, contactez notre service client à <a href="mailto:support@trainingstudio.com">support@trainingstudio.com</a>
        </p>
    </div>
</div>

<style>
    .profile-container {
        font-family: 'Roboto', sans-serif;
    }
    .alert-warning {
        background-color: #fff3cd;
        border-left: 4px solid #ffc107;
    }
    .btn {
        transition: all 0.3s ease;
    }
</style>

<script src="/js/profile.js"></script>
@endsection