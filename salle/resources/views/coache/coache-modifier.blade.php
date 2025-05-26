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
    <div class="min-h-screen bg-gray-50" style="margin-top: 5rem">
        <!-- Main Content -->
        <main class="container mx-auto px-4 py-8 animate-fade-in">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Modifier un entraînreur</h1>
                </div>
                    <a href="{{url('/coache/coache-list') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Retour
                    </a>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6 md:p-8">
                    <form id="courseForm" method="POST" action="{{ route('coache.update', $coaches->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <!-- Basic Information Section -->
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Informations D'entraînreur</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nom et Prénom -->
                                <div>
                                    <label for="nom_complet" class="block text-sm font-medium text-gray-700 mb-1">Nom et prénom D'entraînreur*</label>
                                    <input type="text" value="{{ old('nom_complet', $coaches->nom_complet) }}" id="nom_complet" name="nom_complet" required class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition form-control">
                                </div>
                                <!-- Email -->
                                <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail*</label>
                                    <input type="email" value="{{ old('email', $coaches->email) }}" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                       <div class="invalid-feedback"> {{$message}} </div>
                                    @enderror
                                </div>
                                <!-- Spécialité -->
                                <div>
                                    <label for="categorie" class="block text-sm font-medium text-gray-700 mb-1">Catégorie*</label>
                                    <select id="categorie" name="categorie" class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition">
                                    <option value="">Choisir une catégorie</option>
                                        @foreach($categories as $categorie)
                                            <option value="{{ $categorie->id}}">{{$categorie->nom}}</option>
                                        @endforeach
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
                                <i class="fas fa-plus-circle mr-2"></i>Modifier 
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>