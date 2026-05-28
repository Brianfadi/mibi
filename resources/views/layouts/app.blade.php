<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'MIBI')) — Where Love Faces Reality ❤️</title>
    <meta name="description" content="@yield('meta_description', 'MIBI — Make It or Break It: Emotional wellness, relationship coaching, and personal growth. Where Love Faces Reality ❤️')">
    @stack('meta')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css'])
    @stack('styles')

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>
<body class="font-sans antialiased bg-white text-gray-900">
    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/{{ $whatsappNumber ?? config('services.whatsapp.number') }}"
       target="_blank"
       rel="noopener noreferrer"
       class="fixed bottom-6 right-6 z-50 bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition-all duration-300 hover:scale-110"
       aria-label="Chat with MIBI Now">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
        <span class="sr-only">Chat with MIBI Now</span>
    </a>

    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <span class="text-2xl font-bold text-black">MIBI</span>
                        <span class="text-red-600 text-lg">❤️</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex md:items-center md:space-x-8">
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-red-600 transition">About</a>
                    <a href="{{ route('services.index') }}" class="text-gray-700 hover:text-red-600 transition">Services</a>
                    <a href="{{ route('coaching') }}" class="text-gray-700 hover:text-red-600 transition">Coaching</a>
                    <a href="{{ route('programs.index') }}" class="text-gray-700 hover:text-red-600 transition">Programs</a>
                    <a href="{{ route('bookings.create') }}" class="text-gray-700 hover:text-red-600 transition">Book Session</a>
                    <a href="{{ route('blog.index') }}" class="text-gray-700 hover:text-red-600 transition">Blog</a>
                    <a href="{{ route('contact.index') }}" class="text-gray-700 hover:text-red-600 transition">Contact</a>

                    @auth
                        <a href="{{ route('profile') }}" class="text-gray-700 hover:text-red-600 transition">
                            {{ auth()->user()->name }}
                        </a>
                        @can('admin')
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-red-600 transition">Admin</a>
                        @endcan
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-red-600 transition">Login</a>
                        <a href="{{ route('register') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">Get Started</a>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-red-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100">
            <div class="px-4 py-3 space-y-2">
                <a href="{{ route('about') }}" class="block py-2 text-gray-700 hover:text-red-600">About</a>
                <a href="{{ route('services.index') }}" class="block py-2 text-gray-700 hover:text-red-600">Services</a>
                <a href="{{ route('coaching') }}" class="block py-2 text-gray-700 hover:text-red-600">Coaching</a>
                <a href="{{ route('programs.index') }}" class="block py-2 text-gray-700 hover:text-red-600">Programs</a>
                <a href="{{ route('bookings.create') }}" class="block py-2 text-gray-700 hover:text-red-600">Book Session</a>
                <a href="{{ route('blog.index') }}" class="block py-2 text-gray-700 hover:text-red-600">Blog</a>
                <a href="{{ route('contact.index') }}" class="block py-2 text-gray-700 hover:text-red-600">Contact</a>
                @auth
                    <a href="{{ route('profile') }}" class="block py-2 text-gray-700 hover:text-red-600">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left py-2 text-gray-700 hover:text-red-600">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block py-2 text-gray-700 hover:text-red-600">Login</a>
                    <a href="{{ route('register') }}" class="block py-2 text-red-600 font-semibold">Get Started</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="bg-green-50 border-b border-green-200">
            <div class="max-w-7xl mx-auto px-4 py-3">
                <p class="text-green-800 text-sm">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border-b border-red-200">
            <div class="max-w-7xl mx-auto px-4 py-3">
                <p class="text-red-800 text-sm">{{ session('error') }}</p>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">MIBI</h3>
                    <p class="text-gray-400 text-sm">Where Love Faces Reality ❤️</p>
                    <p class="text-gray-400 text-sm mt-2">Emotional wellness, relationship coaching, and personal growth.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ route('about') }}" class="hover:text-red-400 transition">About</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-red-400 transition">Services</a></li>
                        <li><a href="{{ route('bookings.create') }}" class="hover:text-red-400 transition">Book Session</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-red-400 transition">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Support</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ route('contact.index') }}" class="hover:text-red-400 transition">Contact Us</a></li>
                        <li><a href="{{ route('privacy') }}" class="hover:text-red-400 transition">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}" class="hover:text-red-400 transition">Terms of Service</a></li>
                        <li><a href="{{ route('contact.index') }}#faq" class="hover:text-red-400 transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-red-400 transition" aria-label="TikTok">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-red-400 transition" aria-label="Instagram">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-red-400 transition" aria-label="Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-red-400 transition" aria-label="YouTube">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} MIBI. All rights reserved. Made with ❤️ for healing hearts.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <script>
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            document.getElementById('mobile-menu')?.classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>
</html>
