@extends('layouts.app')

@section('title', 'Modifier cours')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text"></div>
</div>

<script src="https://cdn.tailwindcss.com"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8fafc;
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
</style>

<div class="min-h-screen bg-gray-50 mt-5">
    <main class="container mx-auto px-4 py-8 animate-fade-in">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Modifier le cours</h1>
            <a href="{{ url('/cours/list-cours') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition flex items-center mt-4 md:mt-0">
                <i class="fas fa-arrow-left mr-2"></i> Retour
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6 md:p-8">
                <form method="POST" action="{{ route('cours.update', $course->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Informations De Cours</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">Titre De Cours*</label>
                                <input type="text" id="titre" name="titre" value="{{ old('titre', $course->titre) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition">
                            </div>
                            <div>
                                <label for="catégorie" class="block text-sm font-medium text-gray-700 mb-1">Catégorie*</label>
                                <select id="catégorie" name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition">
                                    <option value="">Sélectionner une catégorie</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}" @if($course->category_id == $categorie->id) selected @endif>
                                            {{ $categorie->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="duree" class="block text-sm font-medium text-gray-700 mb-1">Durée (minutes)*</label>
                                <input type="number" id="duree" name="duree" min="1" value="{{ old('duree', $course->duree) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition">
                            </div>
                            <div>
                                <label for="capacite_max" class="block text-sm font-medium text-gray-700 mb-1">Capacité Max*</label>
                                <input type="number" id="capacite_max" name="capacite_max" min="1" value="{{ old('capacite_max', $course->capacite_max) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition">
                            </div>
                            <div>
                                <label for="coach_id" class="block text-sm font-medium text-gray-700 mb-1">Entraîneur*</label>
                                <select id="coach_id" name="coach_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition">
                                    <option value="">Sélectionner un entraîneur</option>
                                    @foreach ($coaches as $coach)
                                        <option value="{{ $coach->id }}" @if($course->coach_id == $coach->id) selected @endif>{{ $coach->nom_complet }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Détails De Cours</h2>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition">{{ old('description', $course->description) }}</textarea>
                        </div>
                    </div>

                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="statut" class="block text-sm font-medium text-gray-700 mb-1">Statut*</label>
                                <select id="statut" name="statut" class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition">
                                    @foreach (['PLANIFIE', 'EN_COURS', 'TERMINE', 'ANNULE'] as $status)
                                        <option value="{{ $status }}" @if($course->statut == $status) selected @endif>{{ ucfirst(strtolower(str_replace('_',' ',$status))) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col-reverse md:flex-row justify-end space-y-4 md:space-y-0 space-x-0 md:space-x-3">
                        <a href="{{ url()->previous() }}" class="px-6 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition flex items-center justify-center">
                            <i class="fas fa-times mr-2"></i>Annuler
                        </a>
                        <button type="submit" class="gradient-bg text-white px-6 py-2.5 rounded-lg hover:opacity-90 transition flex items-center justify-center shadow-md">
                            <i class="fas fa-save mr-2"></i>Modifier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection
