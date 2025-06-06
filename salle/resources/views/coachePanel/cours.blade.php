@extends('layouts.app')
@section('title', 'Mes Cours')
@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
<div class="container" style="margin-top:7rem">
    <h2 class="mb-4">Mes Cours</h2>
    <ul>
        @forelse($cours as $cours)
            <li>{{ $cours->titre }} ({{ $cours->description }})</li>
        @empty
            <li>Aucun cours disponible.</li>
        @endforelse
    </ul>
</div>
@endsection