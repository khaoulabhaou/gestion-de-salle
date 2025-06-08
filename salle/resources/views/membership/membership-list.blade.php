@extends('layouts.app')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
    <script src="https://cdn.tailwindcss.com"></script>
<div class="container py-5" style="margin-top: 4rem">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">List des Abonnements</h1>
        </div>
        <div class="col-md-auto text-end">
            <a href="{{ url('/membership/create-membership') }}" class="btn text-white" style="background-color: #eb653b;" id="addbtn">
            <style>
                #addbtn:hover {
                    background-color: #cf502a !important;
                }
            </style>
                <i class="fas fa-plus-circle me-1"></i> Ajouter Abonnement
            </a>                    
            <a href="{{ url('/admin/dashboard') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Retour
            </a>
        </div>
    </div>
    {{-- Search Bar --}}
    <form method="GET" action="{{ route('list-membership') }}" class="mb-4">
        {{-- <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search memberships...">
            <button class="btn text-white" type="submit" style="background-color: #eb653b;">
                <i class="fas fa-search"></i>
            </button>
        </div> --}}
    </form>

    {{-- memberships Table --}}
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Durée</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($memberships as $membership)
                <tr>
                    <td>{{ $membership->name ?? '-' }}</td>
                    <td>{{ $membership->description ?? '-'}}</td>
                    <td>{{ $membership->price ?? '-' }} MAD</td>
                    <td>{{ $membership->duration ?? '-' }} mois</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <form action="{{ route('membership.update', $membership->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <a href="{{ route('membership.edit', $membership->id) }}" class="text-warning m-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </form>
                            <form action="{{ route('membership.destroy', $membership->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Es-tu sûr?')" class="btn btn-link p-0 text-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Aucun cours trouvé</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{-- {{ $memberships->appends(['search' => request('search')])->links() }} --}}
    </div>
</div>
@endsection