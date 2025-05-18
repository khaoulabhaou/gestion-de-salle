@extends('layouts.app')

@section('title', 'admin dashboard')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .sidebar {
            transition: all 0.3s ease;
            transform: translateX(-100%);
        }
        .sidebar.open {
            transform: translateX(0);
        }
        .sidebar-item.active {
            background-color: rgba(59, 130, 246, 0.1);
            border-left: 4px solid #3b82f6;
        }
        .sidebar-item:hover:not(.active) {
            background-color: rgba(59, 130, 246, 0.05);
        }
        .overlay {
            transition: opacity 0.3s ease;
        }
        @media (min-width: 1024px) {
            .sidebar {
                transform: translateX(0);
            }
        }
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
                <div class="px-4 mb-4">
                    <div class="flex items-center text-gray-500 text-sm font-medium uppercase tracking-wider">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        <span>Dashboard</span>
                    </div>
                </div>

                <div class="px-4 mb-4">
                    <div class="flex items-center text-gray-500 text-sm font-medium uppercase tracking-wider">
                        <i class="fas fa-users mr-2"></i>
                        <span>Members</span>
                    </div>
                    <ul class="mt-2">
                        <li>
                            <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                                <i class="fas fa-list mr-3"></i>
                                <span>All Members</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                                <i class="fas fa-plus-circle mr-3"></i>
                                <span>Add New</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                                <i class="fas fa-chart-bar mr-3"></i>
                                <span>Statistics</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="px-4 mb-4">
                    <div class="flex items-center text-gray-500 text-sm font-medium uppercase tracking-wider">
                        <i class="fas fa-user-tie mr-2"></i>
                        <span>Coaches</span>
                    </div>
                    <ul class="mt-2">
                        <li>
                            <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                                <i class="fas fa-list mr-3"></i>
                                <span>Coach List</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                                <i class="fas fa-user-plus mr-3"></i>
                                <span>Hire Coach</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                                <i class="fas fa-calendar-check mr-3"></i>
                                <span>Availability</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="px-4 mb-4">
                    <div class="flex items-center text-gray-500 text-sm font-medium uppercase tracking-wider">
                        <i class="fas fa-book mr-2"></i>
                        <span>Courses</span>
                    </div>
                    <ul class="mt-2">
                        <li>
                            <a href="#" class="sidebar-item active flex items-center px-4 py-2 text-gray-700 rounded-md">
                                <i class="fas fa-list mr-3"></i>
                                <span>All Courses</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                                <i class="fas fa-plus-circle mr-3"></i>
                                <span>Create Course</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                                <i class="fas fa-tags mr-3"></i>
                                <span>Categories</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="px-4 mb-4">
                    <div class="flex items-center text-gray-500 text-sm font-medium uppercase tracking-wider">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span>Planning</span>
                    </div>
                    <ul class="mt-2">
                        <li>
                            <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                                <i class="fas fa-calendar-day mr-3"></i>
                                <span>Daily Schedule</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                                <i class="fas fa-calendar-week mr-3"></i>
                                <span>Weekly View</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-item flex items-center px-4 py-2 text-gray-700 rounded-md">
                                <i class="fas fa-tasks mr-3"></i>
                                <span>Tasks</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex-1 overflow-auto p-6">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Dashboard Overview</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Total Members</p>
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
                                <p class="text-sm font-medium text-gray-500">Active Coaches</p>
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
                                <p class="text-sm font-medium text-gray-500">Courses</p>
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
                                <p class="text-sm font-medium text-gray-500">Today's Sessions</p>
                                <p class="text-2xl font-bold text-gray-800">18</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-medium text-gray-800 mb-4">Quick Actions</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <button class="flex items-center justify-center p-4 bg-white rounded-lg border border-gray-200 hover:bg-blue-50 hover:border-blue-200 transition-colors">
                            <i class="fas fa-user-plus text-blue-500 mr-2"></i>
                            <span>Add Member</span>
                        </button>
                        <button class="flex items-center justify-center p-4 bg-white rounded-lg border border-gray-200 hover:bg-green-50 hover:border-green-200 transition-colors">
                            <i class="fas fa-calendar-plus text-green-500 mr-2"></i>
                            <span>Schedule Session</span>
                        </button>
                        <button class="flex items-center justify-center p-4 bg-white rounded-lg border border-gray-200 hover:bg-purple-50 hover:border-purple-200 transition-colors">
                            <i class="fas fa-book-medical text-purple-500 mr-2"></i>
                            <span>Create Course</span>
                        </button>
                        <button class="flex items-center justify-center p-4 bg-white rounded-lg border border-gray-200 hover:bg-yellow-50 hover:border-yellow-200 transition-colors">
                            <i class="fas fa-file-invoice-dollar text-yellow-500 mr-2"></i>
                            <span>Generate Report</span>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.classList.add('hidden');
        });

        // Set active state for sidebar items
        const sidebarItems = document.querySelectorAll('.sidebar-item');
        sidebarItems.forEach(item => {
            item.addEventListener('click', function() {
                sidebarItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                
                // Close sidebar on mobile after selection
                if (window.innerWidth < 1024) {
                    sidebar.classList.remove('open');
                    overlay.classList.add('hidden');
                }
            });
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnMenuToggle = menuToggle.contains(event.target);
            
            if (!isClickInsideSidebar && !isClickOnMenuToggle && window.innerWidth < 1024) {
                sidebar.classList.remove('open');
                overlay.classList.add('hidden');
            }
        });

        // Resize observer to handle sidebar state
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                sidebar.classList.add('open');
                overlay.classList.add('hidden');
            } else {
                sidebar.classList.remove('open');
            }
        });
    </script>
</body>