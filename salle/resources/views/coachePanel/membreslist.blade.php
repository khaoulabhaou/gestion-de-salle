@extends('layouts.app')
@section('title', 'Liste des Membres')
@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
<div class="container" style="margin-top:7rem">
    <h2 class="mb-4">Mes Membres</h2>
    <ul>
        @forelse($membres as $membre)
            <li>{{ $membre->nom ?? $membre->name }} - {{ $membre->email }}</li>
        @empty
            <li>Aucun membre assigné.</li>
        @endforelse
    </ul>
</div>
@endsection
