@extends('layouts.app')

@section('title','Ajouter cour')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
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
<body>
    <div class="min-h-screen bg-gray-50 mt-5">
        <!-- Main Content -->
        <main class="container mx-auto px-4 py-8 animate-fade-in">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Ajouter un nouveau cours</h1>
                </div>
                <div class="mt-4 md:mt-0 flex space-x-3">
                    <a href="{{url('/admin/dashboard') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Retour
                    </a>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6 md:p-8">
                    <form id="courseForm" method="POST" action="{{ route('cours.store') }}" class="space-y-6">
                        @csrf
                        <!-- Basic Information Section -->
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Informations De Cours</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Title -->
                                <div>
                                    <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">Titre De Cours*</label>
                                    <input type="text" id="titre" name="titre" required class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}">
                                    @error('titre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Categorie -->
                                <div>
                                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie*</label>
                                    <select id="category_id" name="category_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition">
                                        <option value="">Choisir une catégorie</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Duration -->
                                <div>
                                    <label for="duree" class="block text-sm font-medium text-gray-700 mb-1">Duration (minutes)*</label>
                                    <input type="number" id="duree" name="duree" required min="1" class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition form-control @error('duree') is-invalid @enderror" value="{{ old('duree') }}">
                                    @error('duree')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Max Capacity -->
                                <div>
                                    <label for="capacite_max" class="block text-sm font-medium text-gray-700 mb-1">Capacité Max*</label>
                                    <input type="number" id="capacite_max" name="capacite_max" required min="1" class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition form-control @error('capacite_max') is-invalid @enderror">
                                    @error('capacite_max')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- Coach -->
                                <div>
                                    <label for="coach_id" class="block text-sm font-medium text-gray-700 mb-1">entraîneur*</label>
                                    <select id="coach_id" name="coach_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition">
                                        <option value="">Sélectionner un entraîneur</option>
                                        @foreach ($coaches as $coach)
                                            <option class="text-black" value="{{ $coach->id }}">{{ $coach->nom_complet }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Description Section -->
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Details De Cours</h2>
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information Section -->
                        <div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Status -->
                                <div>
                                    <label for="statut" class="block text-sm font-medium text-gray-700 mb-1">Status*</label>
                                    <select id="statut" name="statut" required class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition">
                                        <option value="PLANIFIE">Planifié</option>
                                        <option value="EN_COURS">En cours</option>
                                        <option value="TERMINE">Terminé</option>
                                        <option value="ANNULE">Annulé</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex flex-col-reverse md:flex-row justify-end space-y-4 md:space-y-0 space-x-0 md:space-x-3">
                            <button type="reset" class="px-6 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition flex items-center justify-center">
                                <i class="fas fa-redo mr-2"></i>Remettre
                            </button>
                            <button type="submit" class="gradient-bg text-white px-6 py-2.5 rounded-lg hover:opacity-90 transition flex items-center justify-center shadow-md">
                                <i class="fas fa-plus-circle mr-2"></i>Ajouter 
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>