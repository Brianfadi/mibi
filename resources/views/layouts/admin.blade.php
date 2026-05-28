<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — MIBI Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    @stack('styles')
</head>
<body class="font-['Inter'] antialiased bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Mobile overlay -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-20 hidden"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed md:static inset-y-0 left-0 z-30 w-64 bg-[#0f0f0f] text-white flex flex-col transition-all duration-300 -translate-x-full md:translate-x-0">
            <!-- Logo -->
            <div class="flex items-center justify-between px-5 py-5 border-b border-gray-800">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-red-600 to-red-700 rounded-lg flex items-center justify-center text-white font-bold text-sm">M</div>
                    <div>
                        <span class="text-lg font-bold tracking-tight">MIBI</span>
                        <span class="block text-[10px] text-gray-400 uppercase tracking-widest -mt-0.5">Admin Panel</span>
                    </div>
                </a>
                <button id="closeSidebar" class="md:hidden text-gray-400 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            @include('admin.partials._sidebar')

            <!-- Bottom section -->
            <div class="p-4 border-t border-gray-800">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center text-gray-400 hover:text-white text-sm transition-colors px-3 py-2 rounded-lg hover:bg-gray-800/50">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to Site
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Top Navbar -->
            <header class="bg-white border-b border-gray-200 px-4 lg:px-6 py-3 sticky top-0 z-10 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button id="openSidebar" class="md:hidden text-gray-600 hover:text-gray-900">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </button>
                        <h1 class="text-lg font-semibold text-gray-900 hidden sm:block">@yield('title', 'Dashboard')</h1>
                    </div>

                    <div class="flex items-center space-x-3">
                        <!-- Search -->
                        <div class="relative hidden md:block">
                            <input type="text" placeholder="Search..." class="w-56 lg:w-72 pl-9 pr-3 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-gray-400">
                            <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>

                        <!-- User Dropdown -->
                        <div class="relative" id="userDropdown">
                            <button id="userDropdownBtn" class="flex items-center space-x-2 p-1.5 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                                <div class="hidden lg:block text-left">
                                    <p class="text-sm font-medium text-gray-900 leading-tight">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-500 leading-tight">{{ auth()->user()->email }}</p>
                                </div>
                                <svg class="w-4 h-4 text-gray-400 hidden lg:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div id="userDropdownMenu" class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg border border-gray-100 py-1 hidden z-50">
                                <a href="{{ route('profile') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50">
                                    <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    My Profile
                                </a>
                                <a href="{{ route('admin.settings.index') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50">
                                    <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>
                                    Settings
                                </a>
                                <hr class="border-gray-100 my-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full px-4 py-2.5 text-sm text-red-600 hover:bg-red-50">
                                        <svg class="w-4 h-4 mr-3 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Breadcrumb -->
                @hasSection('breadcrumb')
                <div class="flex items-center text-xs text-gray-400 mt-2">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-600">Dashboard</a>
                    @yield('breadcrumb')
                </div>
                @endif
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4 lg:p-6">
                @if(session('success'))
                    <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3.5 rounded-xl flex items-center space-x-2 text-sm" role="alert">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3.5 rounded-xl flex items-center space-x-2 text-sm" role="alert">
                        <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @vite(['resources/js/app.js'])

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile sidebar toggle
            var sidebar = document.getElementById('sidebar');
            var overlay = document.getElementById('sidebarOverlay');
            var openBtn = document.getElementById('openSidebar');
            var closeBtn = document.getElementById('closeSidebar');

            if (openBtn && sidebar && overlay) {
                openBtn.addEventListener('click', function() { sidebar.classList.remove('-translate-x-full'); overlay.classList.remove('hidden'); });
                closeBtn.addEventListener('click', function() { sidebar.classList.add('-translate-x-full'); overlay.classList.add('hidden'); });
                overlay.addEventListener('click', function() { sidebar.classList.add('-translate-x-full'); overlay.classList.add('hidden'); });
            }

            // User dropdown toggle
            var dropdownBtn = document.getElementById('userDropdownBtn');
            var dropdownMenu = document.getElementById('userDropdownMenu');
            if (dropdownBtn && dropdownMenu) {
                dropdownBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdownMenu.classList.toggle('hidden');
                });
                document.addEventListener('click', function() { dropdownMenu.classList.add('hidden'); });
                dropdownMenu.addEventListener('click', function(e) { e.stopPropagation(); });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
