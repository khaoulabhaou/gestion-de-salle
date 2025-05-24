@extends('layouts.app')

@section('title', 'Détails Catégorie')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
<div class="container my-5">
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>

<div class="container" style="margin-top: 6rem">

    <div>
        <div class="text-end">
            <a href="{{ url('/cours/catégorie/catégorie-list') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Retour
            </a>
        </div>
    </div>

    <div class="mt-5">
        <input type="text" class="form-control" placeholder="🔍 Rechercher..." id="searchInput">
    </div>

    <table class="table table-hover table-bordered table-stripped mt-5">
        <thead>
            <tr>
                <th>Nom de categorie</th>
                <th>Liste des entraîneurs</th>
                <th>Liste de cours</th>
            </tr>
        </thead>
    <tbody>
        @foreach ($categorie->cours as $cours)
            <tr>
                <td>{{ $categorie->nom }}</td>
                <td>{{ $cours->coach->nom_complet ?? '—' }}</td>
                <td>{{ $cours->titre }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
    {{-- <p><strong>Membres (approx):</strong> {{ $membersCount }}</p> --}}
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const coursList = document.getElementById('coursList');
    const cards = coursList.querySelectorAll('.card');

    searchInput.addEventListener('input', function () {
        const searchValue = this.value.toLowerCase();
        cards.forEach(card => {
            card.style.display = card.textContent.toLowerCase().includes(searchValue) ? '' : 'none';
        });
    });
</script>
@endsection