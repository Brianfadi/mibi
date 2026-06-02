<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'MIBI')) — Where Love Faces Reality</title>
    <meta name="description" content="@yield('meta_description', 'MIBI — Make It or Break It: Emotional wellness, relationship coaching, and personal growth. Where Love Faces Reality.')">
    @stack('meta')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    @stack('styles')
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>
<body class="font-sans antialiased bg-white text-gray-900">

    <!-- WhatsApp Floating Widget -->
    <a href="https://wa.me/254755386517" target="_blank" rel="noopener noreferrer" class="fixed bottom-4 sm:bottom-6 left-4 sm:left-6 z-[9999] flex items-center space-x-2 bg-green-500 text-white pl-3 pr-4 py-2.5 sm:py-3 rounded-full shadow-2xl hover:bg-green-600 transition-all duration-300 hover:scale-105" style="display:flex!important">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        <span class="font-semibold text-sm whitespace-nowrap">Chat with MIBI</span>
    </a>

    <!-- Navigation -->
    <nav class="bg-[#111111] sticky top-0 z-40 w-full border-b border-red-800/40 shadow-[0_0_30px_-5px_rgba(220,38,38,0.2)]">
        <div class="absolute inset-0 bg-gradient-to-b from-red-700/10 via-red-900/5 to-transparent pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-red-500/50 to-transparent pointer-events-none"></div>
        <div class="w-full mx-auto px-3 sm:px-6 lg:px-8">
            <div class="flex justify-between h-14 md:h-20 items-center max-w-7xl mx-auto">
                <a href="{{ route('home') }}" class="flex items-center space-x-2 md:space-x-3">
                    <img src="{{ asset('images/logo.png') }}" alt="MIBI Logo" class="h-8 md:h-10 w-auto">
                    <div>
                        <span class="text-lg md:text-2xl font-extrabold text-white tracking-tight">MIBI</span>
                        <p class="hidden sm:block text-[8px] md:text-[9px] text-gray-400 uppercase tracking-[0.15em] leading-none">Make It or Break It</p>
                        <p class="hidden sm:block text-[7px] md:text-[8px] text-red-500 uppercase tracking-[0.12em] leading-none mt-0.5">Where Love Faces Reality</p>
                    </div>
                </a>

                <div class="hidden lg:flex lg:items-center lg:space-x-1">
                    @php $navLinks = [
                        ['route' => 'home', 'name' => 'Home', 'pattern' => 'home'],
                        ['route' => 'about', 'name' => 'About', 'pattern' => 'about'],
                        ['route' => 'services.index', 'name' => 'Services', 'pattern' => 'services.*'],
                        ['route' => 'coaching', 'name' => 'Coaching', 'pattern' => 'coaching'],
                        ['route' => 'bookings.create', 'name' => 'Book Session', 'pattern' => 'bookings.*'],
                        ['route' => 'blog.index', 'name' => 'Blog', 'pattern' => 'blog.*'],
                        ['route' => 'testimonials.index', 'name' => 'Testimonials', 'pattern' => 'testimonials.*'],
                        ['route' => 'contact.index', 'name' => 'Contact', 'pattern' => 'contact.*'],
                    ]; @endphp
                    @foreach($navLinks as $link)
                    <a href="{{ route($link['route']) }}" class="relative px-3 py-2 text-sm font-medium uppercase tracking-wide transition-colors duration-200 {{ request()->routeIs($link['pattern']) ? 'text-red-500' : 'text-gray-300 hover:text-red-400' }} group">
                        {{ $link['name'] }}
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-red-500 transition-all duration-300 {{ request()->routeIs($link['pattern']) ? 'w-4/5' : 'group-hover:w-4/5' }}"></span>
                    </a>
                    @endforeach
                    @auth
                        @can('admin')
                        <a href="{{ route('admin.dashboard') }}" class="relative px-3 py-2 text-sm font-medium uppercase tracking-wide transition-colors duration-200 {{ request()->routeIs('admin.*') ? 'text-red-500' : 'text-gray-300 hover:text-red-400' }} group">
                            Admin
                            <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-red-500 transition-all duration-300 {{ request()->routeIs('admin.*') ? 'w-4/5' : 'group-hover:w-4/5' }}"></span>
                        </a>
                        @endcan
                    @endauth
                </div>

                <div class="hidden lg:flex lg:items-center lg:space-x-3">
                    @auth
                        <a href="{{ route('profile') }}" class="text-gray-300 hover:text-red-400 text-sm font-medium transition">{{ auth()->user()->name }}</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white text-sm font-medium transition px-3 py-2">Login</a>
                    @endauth
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-5 py-2.5 rounded-xl text-sm font-bold uppercase tracking-wide transition-all duration-300 shadow-lg shadow-red-600/25 hover:shadow-red-600/40 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                        <span>Register</span>
                    </a>
                </div>

                <div class="lg:hidden flex items-center space-x-2">
                    @auth
                    @else
                    <a href="{{ route('register') }}" class="bg-red-600 text-white px-3 py-1.5 rounded-lg text-xs font-bold uppercase">Join</a>
                    @endauth
                    <button id="mobile-menu-button" class="relative w-10 h-10 flex items-center justify-center text-gray-300 hover:text-red-400 transition-colors rounded-xl hover:bg-white/5">
                        <svg id="menu-icon-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                        <svg id="menu-icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobile-menu" class="fixed inset-0 z-50 hidden lg:hidden">
            <div id="mobile-overlay" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
            <div class="absolute top-0 right-0 w-[280px] max-w-[85vw] h-full bg-[#0f0f0f] border-l border-white/10 shadow-2xl overflow-y-auto">
                <div class="flex items-center justify-between px-5 py-4 border-b border-white/10">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('images/logo.png') }}" alt="MIBI" class="h-7 w-auto">
                        <span class="text-white font-extrabold text-lg">MIBI</span>
                    </div>
                    <button id="mobile-menu-close" class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-white rounded-lg hover:bg-white/5 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <div class="px-4 py-4 space-y-1">
                    @foreach($navLinks as $link)
                    <a href="{{ route($link['route']) }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs($link['pattern']) ? 'bg-red-600/10 text-red-400 border border-red-600/20' : 'text-gray-300 hover:bg-white/5 hover:text-white border border-transparent' }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs($link['pattern']) ? 'bg-red-500' : 'bg-gray-600' }}"></span>
                        {{ $link['name'] }}
                    </a>
                    @endforeach
                </div>
                <div class="px-4 py-3 border-t border-white/10">
                    @auth
                        <a href="{{ route('profile') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm text-gray-300 hover:bg-white/5 transition">{{ auth()->user()->name }}</a>
                        @can('admin')
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm text-gray-300 hover:bg-white/5 transition">Admin</a>
                        @endcan
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl text-sm text-gray-300 hover:bg-white/5 transition">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="flex items-center justify-center space-x-2 px-4 py-3 rounded-xl text-sm text-gray-300 hover:bg-white/5 transition border border-white/10 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            <span>Login</span>
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center justify-center space-x-2 w-full bg-gradient-to-r from-red-600 to-red-700 text-white px-4 py-3 rounded-xl text-sm font-bold uppercase tracking-wide">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                            <span>Register Now</span>
                        </a>
                    @endauth
                </div>
                <div class="px-4 py-4 border-t border-white/5">
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest text-center">Where Love Faces Reality ❤️</p>
                </div>
            </div>
        </div>
    </nav>

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

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#111111] text-white relative pt-16 pb-8 w-full border-t border-red-800/50 shadow-[0_0_30px_-5px_rgba(220,38,38,0.25)]">
        <div class="absolute inset-0 bg-gradient-to-t from-red-700/15 via-red-900/5 to-transparent pointer-events-none"></div>
        <div class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-red-500/60 to-transparent pointer-events-none"></div>
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-10 mb-12">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="MIBI Logo" class="h-12 w-auto">
                        <div>
                            <span class="text-2xl font-extrabold text-white">MIBI</span>
                            <p class="text-[10px] text-red-500 uppercase tracking-wider">Make It or Break It</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">Where Love Faces Reality. Emotional wellness, relationship coaching, and personal growth.</p>
                    <div class="flex space-x-3 mt-5">
                        <a href="{{ $socialLinks['tiktok'] ?? '#' }}" class="w-9 h-9 bg-white/10 hover:bg-red-600 rounded-lg flex items-center justify-center transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg></a>
                        <a href="{{ $socialLinks['instagram'] ?? '#' }}" class="w-9 h-9 bg-white/10 hover:bg-red-600 rounded-lg flex items-center justify-center transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a>
                        <a href="{{ $socialLinks['facebook'] ?? '#' }}" class="w-9 h-9 bg-white/10 hover:bg-red-600 rounded-lg flex items-center justify-center transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
                        <a href="{{ $socialLinks['youtube'] ?? '#' }}" class="w-9 h-9 bg-white/10 hover:bg-red-600 rounded-lg flex items-center justify-center transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a>
                    </div>
                </div>
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-wider mb-5">Quick Links</h4>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-red-400 transition">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-red-400 transition">About Us</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-red-400 transition">Services</a></li>
                        <li><a href="{{ route('coaching') }}" class="hover:text-red-400 transition">Coaching</a></li>
                        <li><a href="{{ route('bookings.create') }}" class="hover:text-red-400 transition">Book Session</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-wider mb-5">Resources</h4>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="{{ route('blog.index') }}" class="hover:text-red-400 transition">Blog</a></li>
                        <li><a href="{{ route('programs.index') }}" class="hover:text-red-400 transition">Programs</a></li>
                        <li><a href="{{ route('contact.index') }}#faq" class="hover:text-red-400 transition">FAQ</a></li>
                        <li><a href="{{ route('live-sessions.index') }}" class="hover:text-red-400 transition">Live Sessions</a></li>
                        <li><a href="{{ route('testimonials.index') }}" class="hover:text-red-400 transition">Testimonials</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-wider mb-5">Contact Us</h4>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li class="flex items-start space-x-2"><span>WhatsApp:</span><span class="text-white">+254 755 386 517</span></li>
                        <li class="flex items-start space-x-2"><span>Email:</span><span class="text-white">{{ $contactEmail ?? 'info@mibi.co.ke' }}</span></li>
                        <li class="flex items-start space-x-2"><span>Nairobi, Kenya</span></li>
                    </ul>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="bg-red-600 rounded-2xl p-6 md:p-8 flex flex-col md:flex-row items-center justify-between mb-10">
                <div class="mb-4 md:mb-0">
                    <h4 class="text-white font-bold text-lg">Stay Connected</h4>
                    <p class="text-red-100 text-sm">Subscribe for relationship tips, advice and updates.</p>
                </div>
                <div class="flex w-full md:w-auto">
                    <input type="email" placeholder="Enter your email" class="flex-1 md:w-64 px-4 py-3 rounded-l-lg text-sm text-gray-900 focus:outline-none">
                    <button class="bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-r-lg font-semibold text-sm transition">Subscribe</button>
                </div>
            </div>

            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row items-center justify-between text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} MIBI - Make It or Break It. All Rights Reserved.</p>
                <div class="flex space-x-6 mt-3 md:mt-0">
                    <a href="{{ route('privacy') }}" class="hover:text-red-400 transition">Privacy Policy</a>
                    <a href="{{ route('terms') }}" class="hover:text-red-400 transition">Terms & Conditions</a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </footer>

    @vite(['resources/js/app.js'])
    <script>
        (function() {
            var menu = document.getElementById('mobile-menu');
            var btn = document.getElementById('mobile-menu-button');
            var closeBtn = document.getElementById('mobile-menu-close');
            var overlay = document.getElementById('mobile-overlay');
            var iconOpen = document.getElementById('menu-icon-open');
            var iconClose = document.getElementById('menu-icon-close');
            function openMenu() { menu.classList.remove('hidden'); document.body.style.overflow = 'hidden'; iconOpen?.classList.add('hidden'); iconClose?.classList.remove('hidden'); }
            function closeMenu() { menu.classList.add('hidden'); document.body.style.overflow = ''; iconOpen?.classList.remove('hidden'); iconClose?.classList.add('hidden'); }
            btn?.addEventListener('click', openMenu);
            closeBtn?.addEventListener('click', closeMenu);
            overlay?.addEventListener('click', closeMenu);
        })();
    </script>
    @stack('scripts')
</body>
</html>
