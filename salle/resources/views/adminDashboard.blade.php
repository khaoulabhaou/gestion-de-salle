@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* (Same styles untouched) */
</style>

<body class="bg-gray-100 font-sans" style="margin-top: 4rem">
<div class="flex h-screen overflow-hidden">
    <!-- Mobile menu button -->
    <button id="menuToggle" class="fixed top-4 left-4 z-50 lg:hidden bg-blue-500 text-white p-2 rounded-md">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Overlay for mobile -->
    <div id="overlay" class="overlay fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar fixed lg:relative w-64 h-full bg-white shadow-lg z-50">
        <div class="p-4 border-b border-gray-200 mt-1">
            <h1 class="text-xl font-bold text-blue-600 flex items-center" style="color: #ed653b">
                <i class="fas fa-crown mr-2"></i>
                Admin Dashboard
            </h1>
        </div>

        <nav class="">
            <!-- Members -->
            <div class="pl-4 mb-4">
                <div class="flex items-center text-gray-500 text-sm font-medium uppercase tracking-wider">
                    <i class="fas fa-users mr-2"></i>
                    <span>Membres</span>
                </div>
                <ul class="mt-2">
                    <li>
                        <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-list mr-3"></i>
                            <span>Tous les Membres</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/membres/ajouter-membre') }}" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-plus-circle mr-3"></i>
                            <span>Ajouter Nouveau</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-chart-bar mr-3"></i>
                            <span>Statistiques</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Entraîneures -->
            <div class="pl-4 mb-4">
                <div class="flex items-center text-gray-500 text-sm font-medium uppercase tracking-wider">
                    <i class="fas fa-user-tie mr-2"></i>
                    <span>Entraîneurs</span>
                </div>
                <ul class="mt-2">
                    <li>
                        <a href="{{ url('/coache/coache-list') }}" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-list mr-3"></i>
                            <span>Liste des Entraîneurs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/coache/ajouter-coache') }}" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-user-plus mr-3"></i>
                            <span>Recruter Entraîneur</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-calendar-check mr-3"></i>
                            <span>Disponibilité</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Courses -->
            <div class="pl-4 mb-4">
                <div class="flex items-center text-gray-500 text-sm font-medium uppercase tracking-wider">
                    <i class="fas fa-book mr-2"></i>
                    <span>Cours</span>
                </div>
                <ul class="mt-2">
                    <li>
                        <a href="{{ url('/cours/list-cours') }}" class="sidebar-item active flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-list mr-3"></i>
                            <span>Tous les Cours</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/cours/ajouter') }}" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-plus-circle mr-3"></i>
                            <span>Créer un Cours</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/cours/catégorie/catégorie-list') }}" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-tags mr-3"></i>
                            <span>Catégories</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Planning -->
            <div class="pl-4 mb-4">
                <div class="flex items-center text-gray-500 text-sm font-medium uppercase tracking-wider">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    <span>Planning</span>
                </div>
                <ul class="mt-2">
                    <li>
                        <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-calendar-day mr-3"></i>
                            <span>Planning Journalier</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-calendar-week mr-3"></i>
                            <span>Vue Hebdomadaire</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-tasks mr-3"></i>
                            <span>Tâches</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 overflow-auto p-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Aperçu du Tableau</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Total Membres</p>
                            <p class="text-2xl font-bold text-gray-800">1,254</p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-50 p-6 rounded-lg border border-green-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                            <i class="fas fa-user-tie text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Entraîneurs Actifs</p>
                            <p class="text-2xl font-bold text-gray-800">24</p>
                        </div>
                    </div>
                </div>

                <div class="bg-purple-50 p-6 rounded-lg border border-purple-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                            <i class="fas fa-book text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Cours</p>
                            <p class="text-2xl font-bold text-gray-800">56</p>
                        </div>
                    </div>
                </div>

                <div class="bg-yellow-50 p-6 rounded-lg border border-yellow-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                            <i class="fas fa-calendar-check text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Séances Aujourd'hui</p>
                            <p class="text-2xl font-bold text-gray-800">18</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                <h3 class="text-lg font-medium text-gray-800 mb-4">Actions Rapides</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <button href="" class="flex items-center justify-center p-4 bg-white rounded-lg border border-gray-200 hover:bg-blue-50 hover:border-blue-200 transition-colors">
                        <i class="fas fa-user-plus text-blue-500 mr-2"></i>
                        <span>Ajouter Membre</span>
                    </button>
                    <button class="flex items-center justify-center p-4 bg-white rounded-lg border border-gray-200 hover:bg-yellow-50 hover:border-yellow-200 transition-colors">
                    <a class="text-black" href="{{ route('coache.create') }}">
                        <i class="fas fa-user-plus text-green-500 mr-2"></i>
                        <span>Ajouter Entraîneur</span>
                    </a>
                    </button>
                    <button class="flex items-center justify-center p-4 bg-white rounded-lg border border-gray-200 hover:bg-purple-50 hover:border-purple-200 transition-colors">
                    <a href="{{ route('ajouter-cour') }}" class="text-black">
                        <i class="fas fa-book-medical text-purple-500 mr-2"></i>
                        <span>Créer Cours</span>
                    </a>
                    </button>
                    <button class="flex items-center justify-center p-4 bg-white rounded-lg border border-gray-200 hover:bg-green-50 hover:border-green-200 transition-colors">
                        <i class="fas fa-calendar-plus text-yellow-500 mr-2"></i>
                        <span>Planifier Séance</span>
                    </button>
                </div>
            </div>
        </div>
    </main>
</div>