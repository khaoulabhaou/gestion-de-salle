@extends('layouts.app')

@section('title', 'Catégories de cours')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text"></div>
</div>
<script src="https://cdn.tailwindcss.com"></script>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    .form-input:focus {
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
    }
    .animate-fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .gradient-bg {
        background: linear-gradient(135deg, #ed653b 0%, #d34318 100%);
    }
    .category-card {
        flex: 0 0 calc(33.333% - 20px);
        margin: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        border-radius: 8px;
        padding: 16px;
        background-color: #fff;
        text-align: center;
    }

    .category-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 6px;
        margin-bottom: 12px;
    }

    @media (max-width: 768px) {
        .category-card {
            flex: 0 0 100%;
        }
    }
</style>

<div class="container" style="margin-top: 7rem">
    <main class="mt-5">
        <div class="container mb-4" >
            <div class="row align-items-center justify-content-between">
                <div class="col-md-auto">
                    <h1 class="h3 fw-bold text-dark">List des catégories</h1>
                </div>
                <div class="col-md-auto text-end">
                    <a href="{{ url('/cours/catégorie/ajouter-catégorie') }}" class="btn text-white" style="background-color: #eb653b;" id="addbtn">
                    <style>
                        #addbtn:hover {
                            background-color: #cf502a !important;
                        }
                    </style>
                        <i class="fas fa-plus-circle me-1"></i> Ajouter Catégorie
                    </a>                    
                    <a href="{{ url('/admin/dashboard') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Retour
                    </a>
                </div>
            </div>
        </div>

        </div>
        <div class="d-flex flex-wrap justify-content-center" style="margin: 0 5rem 0 5rem">
            @foreach ($categories as $categorie)
                <div class="category-card text-start">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('storage/' . $categorie->image) }}" alt="{{ $categorie->nom }}" class="category-image">
                    </div>
                
                    <h3 class="h5 fw-bold mb-2 mt-3">{{ $categorie->nom }}</h3>
                
                    <div class="text-muted small">
                        <p>Cours: {{ $categorie->cours->count() }}</p>
                        <p>Entraîneurs: {{ $categorie->coaches_count}}</p>
                    </div>
                    <div class="d-flex align-items-center gap-2 mt-3">
                        <a href="{{ route('categorie-details', $categorie->id) }}" class="btn btn-success">Voir plus</a>
                        <form action="" method="POST">
                            @csrf
                            @method('PUT')
                            <a href="{{ route('categorie-edit', $categorie->id) }}" class="btn btn-warning">
                                Modifier
                            </a>
                        </form>
                        <form action="{{ route('categorie-destroy', $categorie->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Es-tu sûr?')" class="btn btn-danger">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</div>
@endsection