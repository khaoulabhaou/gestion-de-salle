@extends('layouts.app')
@section('title', 'Mes Cours')
@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
<div class="container" style="margin-top:7rem">
    <h2 class="mb-4">Mes Cours</h2>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Titre</th>
            <th>Description</th>
        </tr>
        @forelse($cours as $cours)
        <tr>
            <td>{{ $cours->titre }}</td>
            <td>{{ $cours->description }}</td>
        </tr>
        @empty
            <tr>Aucun cours disponible.</tr>
        @endforelse
    </table>
</div>
@endsection