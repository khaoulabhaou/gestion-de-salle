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
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Modifier un abonnement</h1>
                </div>
                <div class="mt-4 md:mt-0 flex space-x-3">
                    <a href="{{url('/membership/list-membership') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Retour
                    </a>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6 md:p-8">
                    <form method="POST" action="{{ route('membership.update', $memberships->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <!-- Basic Information Section -->
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Informations D'abonnement</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nom et Prénom -->
                                <div>
                                    <label for="nom_complet" class="block text-sm font-medium text-gray-700 mb-1">Titre d'abonnement*</label>
                                    <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition form-control" value="{{ old('name',$memberships->name) }}">
                                </div>
                                <!-- Email -->
                                <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">description*</label>
                                    <input type="text" id="description" name="description" required class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition form-control @error('description') is-invalid @enderror" value="{{ old('description',$memberships->description) }}">
                                    @error('description')
                                       <div class="invalid-feedback"> {{$message}} </div>
                                    @enderror
                                </div>
                                <!-- Spécialité -->
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Prix*</label>
                                    <input type="text" id="price" name="price" required class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition form-control @error('price') is-invalid @enderror" value="{{ old('price',$memberships->price) }}">
                                    @error('price')
                                       <div class="invalid-feedback"> {{$message}} </div>
                                    @enderror
                                </div>
                                <!-- Duration -->
                                <div>
                                    <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">Durée*</label>
                                    <input type="text" id="duration" name="duration" required class="w-full px-4 py-2 border border-gray-300 rounded-lg form-input focus:border-indigo-500 transition form-control @error('duration') is-invalid @enderror" value="{{ old('duration',$memberships->duration) }}">
                                    @error('duration')
                                       <div class="invalid-feedback"> {{$message}} </div>
                                    @enderror
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