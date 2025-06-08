@extends('layouts.app')

@section('title', 'Modifier un Horaire')

@php
    $hideFooter = true;
@endphp

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text"></div>
</div>

<div class="container mt-5" style="margin-top: 6rem !important; max-width: 700px;">
    <div class="mb-4 text-end">
        <a href="{{ route('horaire.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Retour
        </a>
    </div>

    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">✏️ Modifier un Horaire</h2>

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

        <form action="{{ route('horaire.update', $plannings->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="cour_id" class="form-label">Titre du cours</label>
                <select name="cour_id" class="form-control">
                    @foreach ($cours as $cour)
                        <option value="{{ $cour->id }}" {{ $cour->id == $plannings->cour_id ? 'selected' : '' }}>
                            {{ $cour->titre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="coache_id" class="form-label">Nom de l'entraîneur</label>
                <select name="coache_id" class="form-control">
                    @foreach ($coaches as $c)
                        <option value="{{ $c->id }}" {{ $c->id == $plannings->coache_id ? 'selected' : '' }}>
                            {{ $c->nom_complet }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jour" class="form-label">Jour</label>
                <select name="jour" class="form-select">
                    @foreach(['Lundi','Mardi','Mercredi','Jeudi','Vendredi'] as $j)
                        <option value="{{ $j }}" {{ $plannings->jour == $j ? 'selected' : '' }}>
                            {{ $j }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="heure_debut" class="form-label">Heure de Début</label>
                <input type="time" name="heure_debut" class="form-control" value="{{ $plannings->heure_debut }}" required>
            </div>

            <div class="mb-3">
                <label for="heure_fin" class="form-label">Heure de Fin</label>
                <input type="time" name="heure_fin" class="form-control" value="{{ $plannings->heure_fin }}" required>
            </div>

            <div class="text-end">
                <button type="submit" class="btn text-white" style="background-color: #eb653d">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
