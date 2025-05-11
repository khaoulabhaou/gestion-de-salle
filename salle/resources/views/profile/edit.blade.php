@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text"></div>
</div>
<link rel="stylesheet" href="/css/profile.css">
<div class="profile-container" style="margin-top: 8rem; max-width: 900px; margin-left: auto; margin-right: auto;">
    <h1 style="text-align:center;">Votre Profil</h1>

@if(session('success'))
    <div style="color: #ed563b;">
        {{ session('success') }}
    </div>
@endif


    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Photo de profil -->
        <div style="margin-bottom: 30px;">
            <div style="text-align: center;">
                 @if($user->pfp)
                     <img src="{{ asset('storage/' . $user->pfp) }}" 
                          alt="Photo de profil" 
                          style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; box-shadow: 0px 0px 5px rgba(0,0,0,0.2);">
                 @endif
            </div>
            <div style="margin-top: 3rem;">
                <label for="form-label">Choisissez votre photo de profil</label>
                <input class="form-control mt-2" type="file" name="pfp">
            </div>
        </div>

        <!-- Informations du profil -->
        <div style="display: flex; gap: 20px; flex-wrap: wrap;">
            <div style="flex: 1;">
                <div class="form-group"><label>Nom</label><input name="name" value="{{ $user->name }}"></div>
                <div class="form-group"><label>Téléphone</label><input name="phone" value="{{ $user->phone }}"></div>
                <div class="form-group"><label>Genre</label>
                    <select name="gender">
                        <option {{ $user->gender === 'Male' ? 'selected' : '' }}>Homme</option>
                        <option {{ $user->gender === 'Female' ? 'selected' : '' }}>Femme</option>
                    </select>
                </div>
                <div class="form-group"><label>Objectif</label><input name="goal" value="{{ $user->goal }}"></div>
            </div>

            <div style="flex: 1;">
                <div class="form-group"><label>Email</label><input name="email" value="{{ $user->email }}"></div>
                <div class="form-group"><label>Date de naissance</label><input type="date" name="dob" value="{{ $user->dob }}"></div>
                <div class="form-group"><label>Adresse</label><input name="address" value="{{ $user->address }}"></div>
                <div class="form-group">
                    <label>Abonnement actuel</label>
                    <a href="{{ route('membership.info') }}" class="btn btn-outline-dark">Voir les détails</a>
                </div>
            </div>
        </div>
        <button id="updateBtn" type="submit">
            {{ session('success') ? 'Enregistrer les modifications' : 'Mettre à jour le profil' }}
        </button>
    </form>

    <!-- Formulaire de déconnexion -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button style="margin-top: 1rem;" class="btn btn-outline-danger" type="submit">Se déconnecter</button>
    </form>

</div>

<script>
    document.querySelector('form').addEventListener('submit', function () {
        document.getElementById('updateBtn').textContent = 'Enregistrement...';
    });
</script>

<script src="/js/profile.js"></script>
@endsection