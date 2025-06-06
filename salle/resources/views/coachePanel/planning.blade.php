@extends('layouts.app')
@section('title', 'Planning Hebdomadaire')
@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
<div class="container" style="margin-top:7rem">
    <h2 class="mb-4">Planning Hebdomadaire</h2>
    <ul>
        @forelse($seances as $seance)
            <li>{{ $seance->jour }} - {{ $seance->heure }} ({{ $seance->cours->titre ?? 'Sans titre' }})</li>
        @empty
            <li>Pas de séances prévues.</li>
        @endforelse
    </ul>
</div>
@endsection