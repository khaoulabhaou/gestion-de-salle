@extends('layouts.app')

@section('title', 'Ajouter une Catégorie')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text"></div>
</div>
<div class="container" style="margin-top: 7rem">
    <div class="mb-4 text-end">
        <a href="{{ url('/cours/catégorie/catégorie-list') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Retour
        </a>
    </div>

    <h2 class="text-2xl font-bold mb-4">Modifier une nouvelle Catégorie</h2>

    <form action="{{ route('categorie-update', $categorie->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <!-- Name -->
        <div>
            <label for="nom" class="block text-sm font-medium text-gray-700">Titre de Catégorie</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom',$categorie->nom) }}" class="w-full mt-1 p-2 border rounded w-50 form-control @error('nom') is-invalid @enderror" required>
            @error('nom')
                <div class="invalid-feedback"> {{$message}} </div>
            @enderror
        </div>

        <!-- Image -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mt-3">Image</label>
            <input type="file" value="{{ old('image', $categorie->image) }}" name="image" id="image" class="form-control w-50 mb-3 mt-1 p-2 border rounded">
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mt-3">Description</label>
            <textarea name="description" id="description" rows="9" class="form-control w-50 mb-3 mt-1 p-2 border rounded @error('description') is-invalid @enderror">{{ old('description', $categorie->description ?? '') }}</textarea>
            @error('description')
                <div class="invalid-feedback mb-3"> {{$message}} </div>
            @enderror
        </div>

        <!-- Submit -->
        <button id="addbtn" type="submit" class="text-white px-4 py-2 rounded" style="background-color: #ed653b">
            Modifier Catégorie
        </button>
        
        <style>
            #addbtn:hover {
                background-color: #cf502a !important;
            }
        </style>

        </div>
    </form>
</div>
@endsection
