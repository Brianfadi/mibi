@extends('layouts.app')

@section('title', 'MIBI — Where Love Faces Reality')

@push('styles')
<style>
    .reveal { opacity: 0; transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
    .reveal-left { transform: translateX(-40px); }
    .reveal-right { transform: translateX(40px); }
    .reveal-up { transform: translateY(40px); }
    .reveal-scale { transform: scale(0.9); }
    .reveal.revealed { opacity: 1; transform: translateX(0) translateY(0) scale(1); }
    .counter-value { font-variant-numeric: tabular-nums; }
    .pulse-ring { animation: pulseRing 2s ease-out infinite; }
    @keyframes pulseRing { 0% { box-shadow: 0 0 0 0 rgba(220,38,38,0.5); } 100% { box-shadow: 0 0 0 20px rgba(220,38,38,0); } }
    .glow-line { height: 3px; background: linear-gradient(90deg, transparent, #dc2626, transparent); width: 80px; margin: 0 auto; }
    .service-card { background-size: cover; background-position: center; position: relative; }
    .service-card::before { content: ''; position: absolute; inset: 0; background: rgba(255,255,255,0.92); border-radius: inherit; transition: 0.4s; }
    .service-card:hover::before { background: rgba(255,255,255,0.97); }
    .service-card > * { position: relative; z-index: 1; }
    .step-number { width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; border-radius: 50%; font-weight: 800; font-size: 1.125rem; }
    .vid-btn { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; cursor: pointer; }
    @media (max-width: 768px) { .parallax-bg { background-attachment: scroll; } }
</style>
@endpush

@section('content')

<!-- ======================== -->
<!-- 1. HERO SECTION -->
<!-- ======================== -->
<section class="relative bg-[#111] overflow-hidden min-h-[70vh] lg:min-h-[85vh] flex items-center">
    <div class="absolute inset-0">
        <img src="{{ asset('images/IMG-20260528-WA0015.jpg') }}" alt="" class="w-full h-full object-cover opacity-50">
        <div class="absolute inset-0 bg-gradient-to-r from-[#111] via-[#111]/80 to-[#111]/60"></div>
        <div class="absolute top-0 left-0 w-1/2 h-full bg-gradient-to-r from-red-600/10 to-transparent"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 w-full z-10">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <div class="reveal reveal-left">
                <div class="inline-flex items-center space-x-2 bg-red-600/20 border border-red-600/30 rounded-full px-3 py-1 lg:px-4 lg:py-1.5 text-red-400 text-xs font-semibold mb-4 lg:mb-6 uppercase tracking-wider">
                    <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                    <span>Where Love Faces Reality</span>
                </div>
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold leading-tight mb-4 lg:mb-6">
                    <span class="text-white">Your Healing</span><br>
                    <span class="text-red-600">Starts Today</span>
                </h1>
                <p class="text-gray-300 text-base lg:text-lg mb-6 lg:mb-8 max-w-lg leading-relaxed">
                    We help individuals understand relationships, heal emotionally, make wise decisions and build healthier connections.
                </p>
                <div class="flex flex-row flex-wrap gap-2 lg:gap-4 mb-8 lg:mb-10">
                    <a href="{{ route('bookings.create') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 lg:px-8 py-3 lg:py-3.5 rounded-lg font-semibold transition-all duration-300 flex items-center justify-center space-x-2 shadow-lg shadow-red-600/30 pulse-ring text-sm lg:text-base">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Book a Session</span>
                    </a>
                    <a href="{{ route('services.index') }}" class="border-2 border-white text-white hover:bg-white hover:text-[#111] px-6 lg:px-8 py-3 lg:py-3.5 rounded-lg font-semibold transition-all duration-300 flex items-center justify-center space-x-2 text-sm lg:text-base">
                        <span>Our Services</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('coaching') }}" class="text-white/70 hover:text-white px-4 py-3 lg:py-3.5 font-semibold transition flex items-center justify-center space-x-1 text-sm lg:text-base">
                        <span>Programs</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex -space-x-2">
                        <div class="w-9 h-9 rounded-full bg-red-500 border-2 border-[#111] flex items-center justify-center text-white text-xs font-bold">C</div>
                        <div class="w-9 h-9 rounded-full bg-purple-500 border-2 border-[#111] flex items-center justify-center text-white text-xs font-bold">B</div>
                        <div class="w-9 h-9 rounded-full bg-blue-500 border-2 border-[#111] flex items-center justify-center text-white text-xs font-bold">A</div>
                        <div class="w-9 h-9 rounded-full bg-white/20 border-2 border-[#111] flex items-center justify-center text-white text-xs font-bold">+</div>
                    </div>
                    <span class="text-gray-400 text-sm"><span class="text-white font-bold">500+</span> people healed</span>
                </div>
            </div>
            <div class="reveal reveal-right space-y-4">
                <div class="bg-[#1a1a1a]/80 backdrop-blur-md border border-white/10 rounded-xl p-4 lg:p-5 flex items-center space-x-4 hover:border-red-500/40 transition-all duration-300">
                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-red-600/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-xs lg:text-sm uppercase tracking-wide">Private & Confidential</h3>
                        <p class="text-gray-400 text-xs">Your story is safe with us</p>
                    </div>
                </div>
                <div class="bg-[#1a1a1a]/80 backdrop-blur-md border border-white/10 rounded-xl p-4 lg:p-5 flex items-center space-x-4 hover:border-red-500/40 transition-all duration-300">
                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-red-600/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-xs lg:text-sm uppercase tracking-wide">Expert Coaching</h3>
                        <p class="text-gray-400 text-xs">Professional guidance you can trust</p>
                    </div>
                </div>
                <div class="bg-[#1a1a1a]/80 backdrop-blur-md border border-white/10 rounded-xl p-4 lg:p-5 flex items-center space-x-4 hover:border-red-500/40 transition-all duration-300">
                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-red-600/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-xs lg:text-sm uppercase tracking-wide">Heal, Grow, Transform</h3>
                        <p class="text-gray-400 text-xs">Better you, better relationships</p>
                    </div>
                </div>
                <div class="relative rounded-2xl overflow-hidden group cursor-pointer shadow-xl" onclick="this.querySelector('video')?.play()">
                    <video muted loop playsinline poster="{{ asset('images/IMG-20260528-WA0016.jpg') }}" class="w-full h-64 md:h-[28rem] lg:h-[36rem] object-cover rounded-2xl">
                        <source src="{{ asset('videos/VID-20260528-WA0023.mp4') }}" type="video/mp4">
                    </video>
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        <div class="w-14 h-14 lg:w-16 lg:h-16 bg-red-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 lg:w-7 lg:h-7 text-white ml-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================== -->
<!-- 2. SERVICE BAR -->
<!-- ======================== -->
<section class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 lg:gap-6">
            <div class="flex items-center space-x-4 group cursor-pointer">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0 group-hover:bg-red-600 transition-all duration-300">
                    <svg class="w-6 h-6 text-red-600 group-hover:text-white transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900">Private Sessions</h4>
                    <p class="text-gray-500 text-sm">One-on-one calls or video sessions</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 group cursor-pointer">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0 group-hover:bg-red-600 transition-all duration-300">
                    <svg class="w-6 h-6 text-red-600 group-hover:text-white transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900">Emotional Healing</h4>
                    <p class="text-gray-500 text-sm">Heal from heartbreak and move forward</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 group cursor-pointer sm:col-span-2 md:col-span-1">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0 group-hover:bg-red-600 transition-all duration-300">
                    <svg class="w-6 h-6 text-red-600 group-hover:text-white transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900">Relationship Coaching</h4>
                    <p class="text-gray-500 text-sm">Guidance for healthy relationships</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================== -->
<!-- 3. MINI VIDEO CARD -->
<!-- ======================== -->
<section class="bg-white py-10 lg:py-14 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-5 gap-6 lg:gap-8 items-center">
            <div class="md:col-span-3 reveal reveal-left">
                <span class="text-red-600 font-bold text-sm uppercase tracking-widest">Watch This</span>
                <h3 class="text-xl md:text-2xl lg:text-3xl font-extrabold text-gray-900 mt-2">See How MIBI Changes Lives</h3>
                <p class="text-gray-600 mt-3 text-sm lg:text-base">Hear real stories and see the difference professional coaching makes.</p>
            </div>
            <div class="md:col-span-2 reveal reveal-right">
                <div class="relative rounded-xl overflow-hidden shadow-lg group cursor-pointer h-56 md:h-72 lg:h-96">
                    <video muted loop playsinline poster="{{ asset('images/IMG-20260528-WA0016.jpg') }}" class="w-full h-full object-cover">
                        <source src="{{ asset('videos/VID-20260528-WA0020.mp4') }}" type="video/mp4">
                    </video>
                    <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white ml-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================== -->
<!-- 4. HOW IT WORKS -->
<!-- ======================== -->
<section class="py-12 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 lg:mb-14 reveal reveal-up">
            <span class="text-red-600 font-bold text-sm uppercase tracking-widest">How It Works</span>
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-gray-900 mt-3">Your Journey to Healing</h2>
            <div class="glow-line mt-4"></div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4 lg:gap-8">
            <div class="reveal reveal-up text-center group">
                <div class="relative w-20 h-20 lg:w-24 lg:h-24 mx-auto mb-5">
                    <div class="w-20 h-20 lg:w-24 lg:h-24 bg-red-100 rounded-full flex items-center justify-center group-hover:bg-red-600 transition-all duration-500">
                        <svg class="w-8 h-8 lg:w-10 lg:h-10 text-red-600 group-hover:text-white transition-all duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div class="step-number bg-red-600 text-white absolute -top-2 -right-2 shadow-lg text-sm lg:text-base w-10 h-10 lg:w-12 lg:h-12">1</div>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Apply or Register</h4>
                <p class="text-gray-500 text-sm">Fill out our simple application form to get started</p>
            </div>
            <div class="reveal reveal-up text-center group" style="transition-delay:0.1s">
                <div class="relative w-20 h-20 lg:w-24 lg:h-24 mx-auto mb-5">
                    <div class="w-20 h-20 lg:w-24 lg:h-24 bg-red-100 rounded-full flex items-center justify-center group-hover:bg-red-600 transition-all duration-500">
                        <svg class="w-8 h-8 lg:w-10 lg:h-10 text-red-600 group-hover:text-white transition-all duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                    </div>
                    <div class="step-number bg-red-600 text-white absolute -top-2 -right-2 shadow-lg text-sm lg:text-base w-10 h-10 lg:w-12 lg:h-12">2</div>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Free Consultation</h4>
                <p class="text-gray-500 text-sm">We connect to understand your needs and goals</p>
            </div>
            <div class="reveal reveal-up text-center group" style="transition-delay:0.2s">
                <div class="relative w-20 h-20 lg:w-24 lg:h-24 mx-auto mb-5">
                    <div class="w-20 h-20 lg:w-24 lg:h-24 bg-red-100 rounded-full flex items-center justify-center group-hover:bg-red-600 transition-all duration-500">
                        <svg class="w-8 h-8 lg:w-10 lg:h-10 text-red-600 group-hover:text-white transition-all duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    </div>
                    <div class="step-number bg-red-600 text-white absolute -top-2 -right-2 shadow-lg text-sm lg:text-base w-10 h-10 lg:w-12 lg:h-12">3</div>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Choose Your Path</h4>
                <p class="text-gray-500 text-sm">Pick a coaching program that fits your journey</p>
            </div>
            <div class="reveal reveal-up text-center group" style="transition-delay:0.3s">
                <div class="relative w-20 h-20 lg:w-24 lg:h-24 mx-auto mb-5">
                    <div class="w-20 h-20 lg:w-24 lg:h-24 bg-red-100 rounded-full flex items-center justify-center group-hover:bg-red-600 transition-all duration-500">
                        <svg class="w-8 h-8 lg:w-10 lg:h-10 text-red-600 group-hover:text-white transition-all duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="step-number bg-red-600 text-white absolute -top-2 -right-2 shadow-lg text-sm lg:text-base w-10 h-10 lg:w-12 lg:h-12">4</div>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Heal & Transform</h4>
                <p class="text-gray-500 text-sm">Start your sessions and grow with us step by step</p>
            </div>
        </div>
        <div class="mt-10 lg:mt-12 reveal reveal-up">
            <div class="relative rounded-2xl overflow-hidden shadow-lg group mx-auto max-w-3xl">
                <video muted loop playsinline poster="{{ asset('images/IMG-20260528-WA0019.jpg') }}" class="w-full h-64 md:h-[30rem] lg:h-[40rem] object-cover">
                    <source src="{{ asset('videos/VID-20260528-WA0020.mp4') }}" type="video/mp4">
                </video>
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent flex items-end p-6">
                    <div>
                        <p class="text-white font-bold text-lg">See What to Expect</p>
                        <p class="text-white/70 text-sm">Watch a quick overview of the MIBI experience</p>
                    </div>
                </div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 cursor-pointer" onclick="this.parentElement.querySelector('video').play(); this.remove();">
                    <div class="w-14 h-14 lg:w-16 lg:h-16 bg-red-600 rounded-full flex items-center justify-center shadow-xl hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 lg:w-7 lg:h-7 text-white ml-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================== -->
<!-- 6. WELCOME + MEDIA SECTION -->
<!-- ======================== -->
<section class="py-12 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <div class="reveal reveal-left">
                <span class="text-red-600 font-bold text-sm uppercase tracking-widest">Welcome to MIBI</span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 mt-3 mb-4 lg:mb-6 leading-tight">You Don't Have To<br>Go Through It Alone</h2>
                <p class="text-gray-600 text-base lg:text-lg leading-relaxed mb-6">
                    At MIBI, we provide a safe space for you to talk, heal, and grow. Whether you're dealing with a breakup, relationship issues, low self-worth, or emotional stress, we are here to help you overcome and become the best version of yourself.
                </p>
                <div class="flex flex-wrap gap-3 mb-8">
                    <span class="inline-flex items-center space-x-1.5 bg-red-50 text-red-700 text-sm px-3 py-1.5 rounded-full">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span>Safe Space</span>
                    </span>
                    <span class="inline-flex items-center space-x-1.5 bg-red-50 text-red-700 text-sm px-3 py-1.5 rounded-full">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span>Non-Judgmental</span>
                    </span>
                    <span class="inline-flex items-center space-x-1.5 bg-red-50 text-red-700 text-sm px-3 py-1.5 rounded-full">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span>Faith-Based</span>
                    </span>
                </div>
                <a href="{{ route('about') }}" class="inline-flex items-center space-x-2 bg-red-600 hover:bg-red-700 text-white px-6 lg:px-8 py-3 lg:py-3.5 rounded-lg font-semibold transition-all duration-300 shadow-lg shadow-red-600/20 text-sm lg:text-base">
                    <span>Learn More About Us</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="reveal reveal-right space-y-6">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/IMG-20260528-WA0014.jpg') }}" alt="MIBI journey" class="w-full h-64 md:h-80 lg:h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent"></div>
                    <div class="absolute inset-0 flex items-center p-6 lg:p-8">
                        <div>
                            <svg class="w-8 h-8 lg:w-10 lg:h-10 text-red-500 mb-3 opacity-70" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10H14.017zM0 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151C7.546 6.068 5.983 8.789 5.983 11H10v10H0z"/></svg>
                            <p class="text-white text-lg lg:text-xl font-semibold leading-relaxed mb-4 max-w-sm">Real love faces challenges, but growth faces the truth. Let's grow together.</p>
                            <p class="text-red-400 font-bold">— MIBI</p>
                        </div>
                    </div>
                </div>
                <div class="relative rounded-2xl overflow-hidden shadow-lg">
                    <video muted loop playsinline poster="{{ asset('images/IMG-20260528-WA0019.jpg') }}" class="w-full h-56 md:h-72 lg:h-96 object-cover">
                        <source src="{{ asset('videos/VID-20260528-WA0022.mp4') }}" type="video/mp4">
                    </video>
                    <div class="vid-btn group" onclick="this.previousElementSibling.play(); this.classList.add('hidden')">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 bg-red-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 lg:w-6 lg:h-6 text-white ml-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================== -->
<!-- 6. OUR SERVICES -->
<!-- ======================== -->
<section class="py-12 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 lg:mb-14 reveal reveal-up">
            <span class="text-red-600 font-bold text-sm uppercase tracking-widest">Our Services +</span>
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-gray-900 mt-3">What We Offer</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Professional coaching services designed to help you heal, grow, and transform your relationships.</p>
            <div class="glow-line mt-4"></div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-5">
            <div class="reveal reveal-up bg-white rounded-2xl p-5 lg:p-6 text-center border border-gray-100 hover:border-red-200 hover:shadow-xl transition-all duration-300 group service-card" style="background-image: url('{{ asset('images/IMG-20260528-WA0011.jpg') }}');">
                <div class="w-12 h-12 lg:w-14 lg:h-14 bg-red-50 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-red-100 transition">
                    <svg class="w-6 h-6 lg:w-7 lg:h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </div>
                <h4 class="font-bold text-gray-900 text-sm lg:text-base mb-1">Relationship Coaching</h4>
                <p class="text-gray-500 text-xs">Improve communication, trust, and connection</p>
            </div>
            <div class="reveal reveal-up bg-white rounded-2xl p-5 lg:p-6 text-center border border-gray-100 hover:border-red-200 hover:shadow-xl transition-all duration-300 group service-card" style="background-image: url('{{ asset('images/IMG-20260528-WA0012.jpg') }}');transition-delay:0.05s">
                <div class="w-12 h-12 lg:w-14 lg:h-14 bg-red-50 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-red-100 transition">
                    <svg class="w-6 h-6 lg:w-7 lg:h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h4 class="font-bold text-gray-900 text-sm lg:text-base mb-1">Breakup Recovery</h4>
                <p class="text-gray-500 text-xs">Heal your heart and move forward stronger</p>
            </div>
            <div class="reveal reveal-up bg-white rounded-2xl p-5 lg:p-6 text-center border border-gray-100 hover:border-red-200 hover:shadow-xl transition-all duration-300 group service-card" style="background-image: url('{{ asset('images/IMG-20260528-WA0017.jpg') }}');transition-delay:0.1s">
                <div class="w-12 h-12 lg:w-14 lg:h-14 bg-red-50 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-red-100 transition">
                    <svg class="w-6 h-6 lg:w-7 lg:h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h4 class="font-bold text-gray-900 text-sm lg:text-base mb-1">Couples Guidance</h4>
                <p class="text-gray-500 text-xs">Rebuild trust and resolve conflicts together</p>
            </div>
            <div class="reveal reveal-up bg-white rounded-2xl p-5 lg:p-6 text-center border border-gray-100 hover:border-red-200 hover:shadow-xl transition-all duration-300 group service-card" style="background-image: url('{{ asset('images/IMG-20260528-WA0016.jpg') }}');transition-delay:0.15s">
                <div class="w-12 h-12 lg:w-14 lg:h-14 bg-red-50 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-red-100 transition">
                    <svg class="w-6 h-6 lg:w-7 lg:h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h4 class="font-bold text-gray-900 text-sm lg:text-base mb-1">Confidence Building</h4>
                <p class="text-gray-500 text-xs">Build self-worth and a positive self-image</p>
            </div>
            <div class="reveal reveal-up bg-white rounded-2xl p-5 lg:p-6 text-center border border-gray-100 hover:border-red-200 hover:shadow-xl transition-all duration-300 group service-card col-span-2 md:col-span-1" style="background-image: url('{{ asset('images/IMG-20260528-WA0015.jpg') }}');transition-delay:0.2s">
                <div class="w-12 h-12 lg:w-14 lg:h-14 bg-red-50 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-red-100 transition">
                    <svg class="w-6 h-6 lg:w-7 lg:h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </div>
                <h4 class="font-bold text-gray-900 text-sm lg:text-base mb-1">Live Sessions</h4>
                <p class="text-gray-500 text-xs">Join interactive group talks and discussions</p>
            </div>
        </div>
        <div class="text-center mt-8 lg:mt-10 reveal reveal-up">
            <a href="{{ route('services.index') }}" class="inline-flex items-center space-x-2 bg-[#111] hover:bg-gray-800 text-white px-6 lg:px-8 py-3 rounded-lg font-semibold transition-all duration-300 text-sm lg:text-base">
                <span>View All Services</span>
            </a>
        </div>
    </div>
</section>

<!-- ======================== -->
<!-- 8. SEE IT IN ACTION -->
<!-- ======================== -->
<section class="py-12 lg:py-16 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-8 lg:gap-10 items-center">
            <div class="reveal reveal-left order-2 md:order-1">
                <span class="text-red-600 font-bold text-sm uppercase tracking-widest">See It In Action</span>
                <h3 class="text-2xl lg:text-3xl font-extrabold text-gray-900 mt-3 mb-4">Watch a Coaching Session</h3>
                <p class="text-gray-600 leading-relaxed mb-6 text-sm lg:text-base">Get a glimpse of what happens in a real MIBI session — the safe space, the guidance, and the breakthrough moments that change lives.</p>
                <a href="{{ route('register') }}" class="inline-flex items-center space-x-2 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 text-sm lg:text-base">
                    <span>Start Your Journey</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="reveal reveal-right order-1 md:order-2">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl group">
                    <video muted loop playsinline poster="{{ asset('images/IMG-20260528-WA0017.jpg') }}" class="w-full h-64 md:h-[30rem] lg:h-[44rem] object-cover">
                        <source src="{{ asset('videos/VID-20260528-WA0020.mp4') }}" type="video/mp4">
                    </video>
                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        <div class="w-14 h-14 lg:w-16 lg:h-16 bg-red-600 rounded-full flex items-center justify-center shadow-xl group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 lg:w-7 lg:h-7 text-white ml-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================== -->
<!-- 9. TESTIMONIALS + VIDEO -->
<!-- ======================== -->
<section class="py-12 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 lg:mb-14 reveal reveal-up">
            <span class="text-red-600 font-bold text-sm uppercase tracking-widest">Testimonials</span>
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-gray-900 mt-3">Real Stories of Transformation</h2>
            <div class="glow-line mt-4"></div>
        </div>
        <div class="grid lg:grid-cols-4 gap-6">
            <div class="lg:col-span-3">
                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-4 lg:gap-6">
                    <div class="reveal reveal-up bg-white rounded-2xl p-6 lg:p-8 border border-gray-100 shadow-sm text-center hover:shadow-md transition-all duration-300">
                        <div class="flex justify-center mb-4">
                            <div class="w-14 h-14 lg:w-16 lg:h-16 bg-red-100 rounded-full flex items-center justify-center">
                                <span class="text-red-600 font-bold text-lg lg:text-xl">C</span>
                            </div>
                        </div>
                        <div class="flex justify-center text-yellow-400 text-sm mb-4">★★★★★</div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">"MIBI helped me heal from a painful breakup. I gained my confidence back and found peace."</p>
                        <p class="font-bold text-gray-900">Cynthia</p>
                        <p class="text-gray-500 text-xs">Kenya</p>
                    </div>
                    <div class="reveal reveal-up bg-white rounded-2xl p-6 lg:p-8 border border-gray-100 shadow-sm text-center hover:shadow-md transition-all duration-300" style="transition-delay:0.1s">
                        <div class="flex justify-center mb-4">
                            <div class="w-14 h-14 lg:w-16 lg:h-16 bg-red-100 rounded-full flex items-center justify-center">
                                <span class="text-red-600 font-bold text-lg lg:text-xl">B</span>
                            </div>
                        </div>
                        <div class="flex justify-center text-yellow-400 text-sm mb-4">★★★★★</div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">"The private sessions are life-changing. I now understand love and myself better."</p>
                        <p class="font-bold text-gray-900">Brian</p>
                        <p class="text-gray-500 text-xs">USA</p>
                    </div>
                    <div class="reveal reveal-up bg-white rounded-2xl p-6 lg:p-8 border border-gray-100 shadow-sm text-center hover:shadow-md transition-all duration-300 col-span-2 md:col-span-1" style="transition-delay:0.2s">
                        <div class="flex justify-center mb-4">
                            <div class="w-14 h-14 lg:w-16 lg:h-16 bg-red-100 rounded-full flex items-center justify-center">
                                <span class="text-red-600 font-bold text-lg lg:text-xl">A</span>
                            </div>
                        </div>
                        <div class="flex justify-center text-yellow-400 text-sm mb-4">★★★★★</div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">"The guidance I got from MIBI saved my relationship. Highly recommended!"</p>
                        <p class="font-bold text-gray-900">Aisha</p>
                        <p class="text-gray-500 text-xs">UK</p>
                    </div>
                </div>
            </div>
            <div class="reveal reveal-right relative rounded-2xl overflow-hidden shadow-lg group h-64 lg:h-auto min-h-[16rem] lg:min-h-0">
                <video muted loop playsinline poster="{{ asset('images/IMG-20260528-WA0018.jpg') }}" class="w-full h-full object-cover absolute inset-0">
                    <source src="{{ asset('videos/VID-20260528-WA0021.mp4') }}" type="video/mp4">
                </video>
                <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center p-6 text-center">
                    <div class="w-12 h-12 lg:w-14 lg:h-14 bg-red-600 rounded-full flex items-center justify-center mb-3 shadow-lg cursor-pointer hover:scale-110 transition-transform" onclick="this.closest('.group').querySelector('video').play(); this.remove();">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6 text-white ml-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    </div>
                    <p class="text-white font-bold text-sm">Watch Video</p>
                    <p class="text-white/60 text-xs mt-1">Hear their stories</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-8 lg:mt-10 reveal reveal-up">
            <a href="{{ route('testimonials.index') }}" class="inline-flex items-center space-x-2 border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white px-6 lg:px-8 py-3 rounded-lg font-semibold transition-all duration-300 text-sm lg:text-base">
                <span>Read More Testimonials</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- ======================== -->
<!-- 8. FULL-WIDTH CTA -->
<!-- ======================== -->
<section class="relative py-16 lg:py-24 overflow-hidden bg-[#111]">
    <div class="absolute inset-0">
        <img src="{{ asset('images/IMG-20260528-WA0018.jpg') }}" alt="" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/80 to-black/80"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-red-600/10 to-transparent"></div>
    </div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="reveal reveal-up">
            <span class="text-red-400 font-bold text-sm uppercase tracking-widest">It's Time For Change</span>
            <h2 class="text-2xl md:text-4xl lg:text-5xl font-extrabold text-white mt-4 mb-4 lg:mb-6 leading-tight">You Deserve Love, Peace,<br>And Emotional Freedom</h2>
            <p class="text-gray-300 text-base lg:text-lg mb-6 lg:mb-8 max-w-2xl mx-auto">Every journey begins with one brave step. Reach out today and let's walk this path together toward healing and transformation.</p>
            <div class="flex flex-row items-center justify-center gap-3 lg:gap-4">
                <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 text-white px-8 lg:px-10 py-3 lg:py-4 rounded-lg font-bold text-base lg:text-lg transition-all duration-300 shadow-xl shadow-red-600/30 pulse-ring">
                    Start Your Journey
                </a>
                <a href="{{ route('bookings.create') }}" class="border-2 border-white text-white hover:bg-white hover:text-black px-8 lg:px-10 py-3 lg:py-4 rounded-lg font-bold text-base lg:text-lg transition-all duration-300">
                    Book a Free Call
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ======================== -->
<!-- 9. COACHING PROGRAMS -->
<!-- ======================== -->
<section class="py-12 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 lg:mb-14 reveal reveal-up">
            <span class="text-red-600 font-bold text-sm uppercase tracking-widest">Programs</span>
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-gray-900 mt-3">Choose Your Healing Path</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Flexible programs designed to meet you where you are and take you where you need to be.</p>
            <div class="glow-line mt-4"></div>
        </div>
        <div class="grid md:grid-cols-3 gap-6 lg:gap-8 max-w-5xl mx-auto">
            <div class="reveal reveal-up bg-white rounded-2xl overflow-hidden border border-gray-200 hover:shadow-xl transition-all duration-300 group">
                <div class="h-40 lg:h-52 overflow-hidden relative">
                    <img src="{{ asset('images/IMG-20260528-WA0011.jpg') }}" alt="1 Month" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <h3 class="text-white font-extrabold text-base lg:text-lg">1 Month Recovery</h3>
                    </div>
                </div>
                <div class="p-5 lg:p-6">
                    <p class="text-red-600 font-bold text-xl lg:text-2xl mb-4">KES 3,500 <span class="text-gray-400 text-sm font-normal">/ $30</span></p>
                    <ul class="text-sm text-gray-600 space-y-3 mb-6">
                        <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Emotional Support</span></li>
                        <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Guidance Sessions (2x)</span></li>
                        <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Community Group Access</span></li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full bg-gray-900 hover:bg-gray-800 text-white py-3 rounded-lg font-semibold transition-all duration-300 text-center text-sm lg:text-base">Choose Plan</a>
                </div>
            </div>
            <div class="reveal reveal-up bg-white rounded-2xl overflow-hidden border-2 border-red-500 shadow-xl relative group" style="transition-delay:0.1s">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-red-600 text-white text-xs font-bold px-4 py-1 rounded-full uppercase z-10">Popular</div>
                <div class="h-40 lg:h-52 overflow-hidden relative">
                    <img src="{{ asset('images/IMG-20260528-WA0012.jpg') }}" alt="3 Months" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <h3 class="text-white font-extrabold text-base lg:text-lg">3 Months Healing</h3>
                    </div>
                </div>
                <div class="p-5 lg:p-6">
                    <p class="text-red-600 font-bold text-xl lg:text-2xl mb-4">KES 8,500 <span class="text-gray-400 text-sm font-normal">/ $75</span></p>
                    <ul class="text-sm text-gray-600 space-y-3 mb-6">
                        <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Everything in 1 Month</span></li>
                        <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Weekly Coaching Sessions</span></li>
                        <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Confidence Building</span></li>
                        <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Priority WhatsApp Support</span></li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg font-semibold transition-all duration-300 text-center text-sm lg:text-base">Choose Plan</a>
                </div>
            </div>
            <div class="reveal reveal-up bg-white rounded-2xl overflow-hidden border border-gray-200 hover:shadow-xl transition-all duration-300 group" style="transition-delay:0.2s">
                <div class="h-40 lg:h-52 overflow-hidden relative">
                    <img src="{{ asset('images/IMG-20260528-WA0019.jpg') }}" alt="6 Months" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <h3 class="text-white font-extrabold text-base lg:text-lg">6 Months Transformation</h3>
                    </div>
                </div>
                <div class="p-5 lg:p-6">
                    <p class="text-red-600 font-bold text-xl lg:text-2xl mb-4">KES 15,000 <span class="text-gray-400 text-sm font-normal">/ $130</span></p>
                    <ul class="text-sm text-gray-600 space-y-3 mb-6">
                        <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Everything in 3 Months</span></li>
                        <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>1-on-1 Mentorship</span></li>
                        <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Deep Trauma Healing</span></li>
                        <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Full Life Transformation</span></li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full bg-gray-900 hover:bg-gray-800 text-white py-3 rounded-lg font-semibold transition-all duration-300 text-center text-sm lg:text-base">Choose Plan</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================== -->
<!-- 10. UPCOMING LIVE SESSIONS -->
<!-- ======================== -->
@if($upcomingSessions->isNotEmpty())
<section class="py-12 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 lg:mb-14 reveal reveal-up">
            <span class="text-red-600 font-bold text-sm uppercase tracking-widest">Join Live</span>
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-gray-900 mt-3">Upcoming Live Sessions</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Join our interactive live sessions and connect with a community that cares.</p>
            <div class="glow-line mt-4"></div>
        </div>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($upcomingSessions as $session)
            <div class="reveal reveal-up bg-white rounded-2xl border border-gray-200 p-5 lg:p-6 hover:shadow-lg hover:border-red-200 transition-all duration-300 group">
                <div class="flex items-center space-x-2 text-red-600 font-semibold text-sm mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>{{ $session->session_date->format('M j, Y') }}</span>
                </div>
                <h3 class="font-bold text-gray-900 mb-2 group-hover:text-red-600 transition-colors">{{ $session->title }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ Str::limit($session->description, 80) }}</p>
                <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                    <span class="text-xs text-gray-500">{{ date('g:i A', strtotime($session->start_time)) }}</span>
                    <a href="{{ route('live-sessions.show', $session->slug) }}" class="inline-flex items-center space-x-1 text-red-600 hover:text-red-700 font-semibold text-sm">
                        <span>Join</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ======================== -->
<!-- 11. VIDEO TESTIMONIAL CARD -->
<!-- ======================== -->
<section class="py-12 lg:py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-5 gap-8 items-center">
            <div class="md:col-span-3 reveal reveal-left">
                <span class="text-red-600 font-bold text-sm uppercase tracking-widest">Don't Just Take Our Word</span>
                <h3 class="text-xl lg:text-3xl font-extrabold text-gray-900 mt-2">Experience the Transformation</h3>
                <p class="text-gray-600 mt-3 leading-relaxed">Watch what happens when people commit to their healing journey. Real change, real stories, real hope.</p>
            </div>
            <div class="md:col-span-2 reveal reveal-right">
                <div class="relative rounded-xl overflow-hidden shadow-xl group h-64 md:h-[30rem] lg:h-[38rem]">
                    <video muted loop playsinline poster="{{ asset('images/IMG-20260528-WA0011.jpg') }}" class="w-full h-full object-cover">
                        <source src="{{ asset('videos/VID-20260528-WA0021.mp4') }}" type="video/mp4">
                    </video>
                    <div class="absolute inset-0 bg-black/25 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 bg-red-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 lg:w-6 lg:h-6 text-white ml-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================== -->
<!-- 12. FINAL CTA -->
<!-- ======================== -->
<section class="relative py-16 lg:py-24 overflow-hidden bg-[#111]">
    <div class="absolute inset-0 opacity-20">
        <img src="{{ asset('images/IMG-20260528-WA0014.jpg') }}" alt="" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#111] via-[#111]/80 to-[#111]/60"></div>
    <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="reveal reveal-up">
            <div class="inline-flex items-center justify-center w-14 h-14 lg:w-16 lg:h-16 bg-red-600/20 rounded-full mb-6">
                <svg class="w-7 h-7 lg:w-8 lg:h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            </div>
            <h2 class="text-2xl md:text-4xl lg:text-5xl font-extrabold text-white mb-4 leading-tight">Ready To Start Your<br>Healing Journey?</h2>
            <p class="text-gray-400 text-base lg:text-lg mb-6 lg:mb-8 max-w-xl mx-auto">Take the first step toward emotional wellness, healthier relationships, and a transformed life. We're here for you.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 text-white px-8 lg:px-10 py-3 lg:py-4 rounded-lg font-bold text-base lg:text-lg transition-all duration-300 shadow-xl shadow-red-600/30 pulse-ring">
                    Apply Now — It's Free
                </a>
                <a href="https://wa.me/254700000000" target="_blank" class="border-2 border-white/30 text-white hover:border-white hover:bg-white/10 px-8 lg:px-10 py-3 lg:py-4 rounded-lg font-bold text-base lg:text-lg transition-all duration-300 flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    <span>Chat on WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    var revealObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
            }
        });
    }, { threshold: 0.1 });
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.reveal').forEach(function(el) { revealObserver.observe(el); });
        initCounters();
    });

    function initCounters() {
        var counters = document.querySelectorAll('.counter-value');
        var counterObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting && !entry.target.dataset.counted) {
                    entry.target.dataset.counted = 'true';
                    animateCounter(entry.target);
                }
            });
        }, { threshold: 0.5 });
        counters.forEach(function(c) { counterObserver.observe(c); });
    }

    function animateCounter(el) {
        var target = parseInt(el.dataset.target);
        var current = 0;
        var step = Math.ceil(target / 60);
        var interval = setInterval(function() {
            current += step;
            if (current >= target) { current = target; clearInterval(interval); }
            el.textContent = current;
        }, 25);
    }

</script>
@endpush