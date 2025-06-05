@extends('layouts.app')

@section('title', 'Ajouter un Horaire')

@php
    $hideFooter = true;
@endphp

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text"></div>
</div>

<div class="container mt-5" style="margin-top: 6rem !important; max-width: 700px;">
        <div class="mb-4 text-end">
        <a href="{{ url('/cours/catégorie/catégorie-list') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Retour
        </a>
    </div>
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">🕒 Ajouter un Horaire</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('horaire.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="cour_id" class="form-label">Titre du cours</label>
            <select name="cour_id" id="cour_id" class="form-control">
                <option>Sélectionner un cour</option>
                @foreach ($cours as $cour)
                <option value="{{ $cour -> id }}">{{$cour->titre}}</option>
                @endforeach
            </select>
            </div>

            <div class="mb-3">
                <label for="coache_id" class="form-label">Nom de l'entraîneur</label>
            <select name="coache_id" id="coache_id" class="form-control">
                <option value="">Sélectionner un entraîneur</option>
                @foreach ($coaches as $c)
                <option value="{{ $c -> id }}">{{$c->nom_complet}}</option>
                @endforeach
            </select>
            </div>

            <div class="mb-3">
                <label for="jour" class="form-label">Jour</label>
                <select name="jour" id="jour" class="form-select" required>
                    <option value="">-- Choisir un jour --</option>
                    <option value="Lundi">Lundi</option>
                    <option value="Mardi">Mardi</option>
                    <option value="Mercredi">Mercredi</option>
                    <option value="Jeudi">Jeudi</option>
                    <option value="Vendredi">Vendredi</option>
                    <option value="Samedi">Samedi</option>
                    <option value="Dimanche">Dimanche</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="heure_debut" class="form-label">Heure de Début</label>
                <input type="time" id="heure_debut" name="heure_debut" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="heure_fin" class="form-label">Heure de Fin</label>
                <input type="time" id="heure_fin" name="heure_fin" class="form-control" required>
            </div>
            
            <div class="text-end">
                <button type="submit" style="background-color: #eb653d" class="btn text-white">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
