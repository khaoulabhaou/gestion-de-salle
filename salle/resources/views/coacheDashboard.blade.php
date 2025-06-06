@extends('layouts.app')

@section('title', 'Coach Dashboard')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text"></div>
</div>
<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gray-100 font-sans" style="margin-top: 4rem">
<div class="flex h-screen overflow-hidden">
    <!-- Mobile menu button -->
    <button id="menuToggle" class="fixed top-4 left-4 z-50 lg:hidden bg-blue-500 text-white p-2 rounded-md">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Overlay for mobile -->
    <div id="overlay" class="overlay fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar fixed lg:relative w-64 h-full bg-white shadow-lg z-50 overflow-y-auto">
        <div class="p-4 border-b border-gray-200 mt-1">
            <h1 class="text-xl font-bold text-blue-600 flex items-center" style="color: #ed653b;font-size:19px">
                <i class="fas fa-dumbbell mr-2"></i>
                Panneau Coache
            </h1>
        </div>

        <nav>
            <!-- Cours -->
            <div class="pl-4 mb-4">
                <div class="flex items-center text-gray-500 text-sm font-medium uppercase tracking-wider">
                    <i class="fas fa-book mr-2"></i>
                    <span>Mes Cours</span>
                </div>
                <ul class="mt-2">
                    <li>
                        <a href="{{ url('/coach/cours') }}" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-list mr-3"></i>
                            <span>Voir mes cours</span>
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
                        <a href="{{ url('/coach/planning/hebdomadaire') }}" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-calendar-week mr-3"></i>
                            <span>Vue Hebdomadaire</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Membres assignés -->
            <div class="pl-4 mb-4">
                <div class="flex items-center text-gray-500 text-sm font-medium uppercase tracking-wider">
                    <i class="fas fa-users mr-2"></i>
                    <span>Mes Membres</span>
                </div>
                <ul class="mt-2">
                    <li>
                        <a href="{{ url('/coach/membres') }}" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                            <i class="fas fa-user-friends mr-3"></i>
                            <span>Liste des Membres</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 overflow-auto p-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Bienvenue Coach</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-green-50 p-6 rounded-lg border border-green-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                            <i class="fas fa-book-open text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Total de mes cours</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $coursCoach }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Mes Membres</p>
                            {{-- <p class="text-2xl font-bold text-gray-800">{{ $mesMembres }}</p> --}}
                        </div>
                    </div>
                </div>

                <div class="bg-yellow-50 p-6 rounded-lg border border-yellow-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                            <i class="fas fa-calendar-alt text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Séances planifiées</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $seancesPlanifiees }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                <h3 class="text-lg font-medium text-gray-800 mb-4">Actions Rapides</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="{{ url('/coach/cours') }}" class="flex items-center justify-center p-4 bg-white rounded-lg border border-gray-200 hover:bg-green-50">
                        <i class="fas fa-plus text-green-500 mr-2"></i>
                        <span>Voir mes Cours</span>
                    </a>
                    <a href="{{ url('/coach/planning/hebdomadaire') }}" class="flex items-center justify-center p-4 bg-white rounded-lg border border-gray-200 hover:bg-blue-50">
                        <i class="fas fa-calendar text-blue-500 mr-2"></i>
                        <span>Voir Planning</span>
                    </a>
                    <a href="{{ url('/coach/membres') }}" class="flex items-center justify-center p-4 bg-white rounded-lg border border-gray-200 hover:bg-yellow-50">
                        <i class="fas fa-envelope text-yellow-500 mr-2"></i>
                        <span>List de membres</span>
                    </a>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection