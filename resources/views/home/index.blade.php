@extends('layouts.app')

@section('title', 'MIBI — Where Love Faces Reality')

@push('styles')
<style>
    .scroll-reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
    .scroll-reveal.revealed { opacity: 1; transform: translateY(0); }
    .hero-gradient { background: linear-gradient(135deg, #000000 0%, #1a0000 40%, #4a0000 70%, #000000 100%); background-size: 400% 400%; animation: gradientShift 15s ease infinite; }
    @keyframes gradientShift { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
    .glow-red { box-shadow: 0 0 30px rgba(220, 38, 38, 0.3); }
    .text-gradient { background: linear-gradient(135deg, #fbbf24, #ef4444, #dc2626); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .service-card:hover .service-icon { transform: scale(1.1) rotate(-5deg); }
    .service-icon { transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
    .floating { animation: floating 3s ease-in-out infinite; }
    @keyframes floating { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
    .testimonial-card { transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
    .testimonial-card:hover { transform: translateY(-8px) scale(1.02); }
</style>
@endpush

@section('content')
<!-- ======================== -->
<!-- 1. HERO BANNER -->
<!-- ======================== -->
<section class="hero-gradient text-white overflow-hidden relative min-h-screen flex items-center">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-10 w-72 h-72 bg-red-600 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-red-800 rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 w-full">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="scroll-reveal">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/mibi-logo.svg') }}" alt="MIBI Logo" class="w-full h-full object-contain">
                    </div>
                    <span class="text-3xl font-bold tracking-tight">MIBI</span>
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-4">
                    Where Love<br>
                    <span class="text-gradient">Faces Reality</span>
                    <span class="text-red-500">❤️</span>
                </h1>
                <p class="text-xl text-gray-300 mb-8 leading-relaxed max-w-xl">
                    Welcome to MIBI — your safe space for emotional wellness, relationship healing, and personal transformation. Every journey begins with one brave step.
                </p>
                <div class="flex flex-col sm:flex-row gap-3 mb-10">
                    <a href="{{ route('coaching') }}" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 glow-red hover:scale-105 text-center">
                        <span class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span>Explore Coaching</span>
                        </span>
                    </a>
                    <a href="{{ route('bookings.create') }}" class="border-2 border-white/30 hover:border-white bg-white/5 hover:bg-white/10 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 hover:scale-105 text-center backdrop-blur-sm">
                        <span class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Book a Session</span>
                        </span>
                    </a>
                    <a href="{{ route('register') }}" class="border-2 border-white/30 hover:border-white bg-white/5 hover:bg-white/10 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 hover:scale-105 text-center backdrop-blur-sm">
                        <span class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                            <span>Register Now</span>
                        </span>
                    </a>
                </div>
                <div class="flex items-center space-x-6 text-gray-400">
                    <span class="text-sm font-medium uppercase tracking-wider">Follow us</span>
                    <a href="{{ $socialLinks['social_tiktok'] ?? '#' }}" class="hover:text-white transition-colors" aria-label="TikTok"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg></a>
                    <a href="{{ $socialLinks['social_instagram'] ?? '#' }}" class="hover:text-white transition-colors" aria-label="Instagram"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a>
                    <a href="{{ $socialLinks['social_facebook'] ?? '#' }}" class="hover:text-white transition-colors" aria-label="Facebook"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
                    <a href="{{ $socialLinks['social_youtube'] ?? '#' }}" class="hover:text-white transition-colors" aria-label="YouTube"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a>
                    <a href="{{ $socialLinks['social_twitter'] ?? '#' }}" class="hover:text-white transition-colors" aria-label="Twitter/X"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>
                </div>
            </div>
            <div class="scroll-reveal lg:block hidden">
                <div class="relative">
                    <div class="w-full aspect-[4/3] bg-gradient-to-br from-red-900/30 to-black rounded-3xl border border-white/10 flex items-center justify-center backdrop-blur-sm">
                        <div class="text-center p-8">
                            <div class="w-24 h-24 bg-red-600/30 rounded-full flex items-center justify-center mx-auto mb-6 floating cursor-pointer hover:bg-red-600/50 transition-all" onclick="showIntroVideo()">
                                <svg class="w-12 h-12 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                            <p class="text-gray-400 text-sm">Watch our intro video</p>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 bg-gradient-to-br from-gold to-yellow-500 text-black px-6 py-3 rounded-2xl font-bold shadow-lg">
                        <span class="text-sm opacity-80">Trusted by</span>
                        <span class="block text-2xl">500+ Clients</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Intro Video Modal (hidden by default) -->
<div id="introVideo" class="fixed inset-0 z-50 items-center justify-center hidden">
    <div class="absolute inset-0 bg-black/70" onclick="closeIntroVideo()"></div>
    <div class="relative max-w-4xl w-full mx-auto p-4">
        <div class="bg-white rounded-2xl overflow-hidden shadow-2xl">
            <div class="relative aspect-video">
                <iframe id="introVideoFrame" class="w-full h-full" src="{{ $introVideoUrl ?? 'https://www.youtube.com/embed/dQw4w9WgXcQ' }}" title="MIBI Intro Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="p-4 text-right">
                <button onclick="closeIntroVideo()" class="inline-flex items-center px-4 py-2 rounded-lg bg-red-600 text-white font-semibold">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- ======================== -->
<!-- 2. ABOUT MIBI -->
<!-- ======================== -->
<section class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="scroll-reveal">
                <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">About MIBI</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6 leading-tight">Healing Hearts,<br>Transforming Lives</h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    At MIBI (<strong>M</strong>ake <strong>I</strong>t or <strong>B</strong>reak <strong>I</strong>t), we believe every relationship deserves a chance to heal and grow. Founded on the principle that <span class="text-red-600 font-semibold">"Where Love Faces Reality"</span>, we provide emotional wellness and relationship coaching to help you navigate life's toughest moments.
                </p>
                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                    Whether you're healing from heartbreak, strengthening your communication, or seeking deeper emotional connection — you don't have to walk alone.
                </p>
                <div class="grid grid-cols-3 gap-6 mb-8">
                    <div><span class="block text-3xl font-bold text-red-600">500+</span><span class="text-gray-500 text-sm">Clients Helped</span></div>
                    <div><span class="block text-3xl font-bold text-red-600">98%</span><span class="text-gray-500 text-sm">Satisfaction</span></div>
                    <div><span class="block text-3xl font-bold text-red-600">4.9★</span><span class="text-gray-500 text-sm">Avg Rating</span></div>
                </div>
                <a href="{{ route('about') }}" class="inline-flex items-center space-x-2 bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300">
                    <span>Learn Our Story</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="scroll-reveal grid grid-cols-2 gap-4">
                <div class="aspect-square bg-gray-50 rounded-3xl flex items-center justify-center p-6">
                    <div class="text-center"><span class="text-5xl">❤️</span><p class="text-sm text-gray-600 mt-2 font-medium">Emotional Healing</p></div>
                </div>
                <div class="aspect-square bg-red-50 rounded-3xl flex items-center justify-center p-6 mt-8">
                    <div class="text-center"><span class="text-5xl">🤝</span><p class="text-sm text-red-700 mt-2 font-medium">Relationship Coaching</p></div>
                </div>
                <div class="aspect-square bg-red-50 rounded-3xl flex items-center justify-center p-6 -mt-4">
                    <div class="text-center"><span class="text-5xl">🌱</span><p class="text-sm text-red-700 mt-2 font-medium">Personal Growth</p></div>
                </div>
                <div class="aspect-square bg-gray-50 rounded-3xl flex items-center justify-center p-6">
                    <div class="text-center"><span class="text-5xl">💪</span><p class="text-sm text-gray-600 mt-2 font-medium">Resilience Building</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================== -->
<!-- 3. OUR SERVICES (Featured Topics) -->
<!-- ======================== -->
@if($featuredServices->isNotEmpty())
<section class="py-24 bg-gray-50 overflow-hidden" id="services">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-reveal">
            <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">What We Offer</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Our Services</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Support tailored to your unique relationship journey — from healing to thriving.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredServices as $service)
            <div class="service-card bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 scroll-reveal group">
                <div class="service-icon w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5">
                    <span class="text-2xl">{{ $service->icon ?? '❤️' }}</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition-colors">{{ $service->title }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-5">{{ $service->short_description }}</p>
                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <span class="text-red-600 font-bold text-lg">{{ $service->formatted_price }}</span>
                    <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center space-x-1 text-sm font-semibold text-gray-700 hover:text-red-600 transition-colors">
                        <span>Learn More</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12 scroll-reveal">
            <a href="{{ route('services.index') }}" class="inline-flex items-center space-x-2 bg-red-600 hover:bg-red-700 text-white px-8 py-3.5 rounded-xl font-semibold transition-all duration-300 shadow-lg shadow-red-600/20">
                <span>View All Services</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- ======================== -->
<!-- 4. COACHING PROGRAMS -->
<!-- ======================== -->
@if($programs->isNotEmpty())
<section class="py-24 bg-white overflow-hidden" id="programs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-reveal">
            <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Structured Growth</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Coaching Programs</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Deep-dive programs designed to guide you through every stage of your emotional journey.</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($programs as $program)
            <div class="scroll-reveal bg-gradient-to-br from-gray-50 to-white rounded-3xl p-8 border border-gray-200 hover:border-red-200 transition-all duration-300 hover:shadow-xl group">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center shadow-lg">
                        <span class="text-white text-xl font-bold">{{ $loop->iteration }}</span>
                    </div>
                    @if($program->is_featured)
                    <span class="bg-gradient-to-r from-gold to-yellow-400 text-black text-xs font-bold px-3 py-1.5 rounded-full">Popular</span>
                    @endif
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition-colors">{{ $program->title }}</h3>
                <p class="text-gray-600 leading-relaxed mb-5">{{ Str::limit($program->description, 150) }}</p>
                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>{{ $program->duration ?? 'Flexible' }}</span>
                        <span class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>{{ $program->price ? 'KES '.number_format($program->price) : 'Free' }}</span>
                    </div>
                    <a href="{{ route('programs.show', $program->slug) }}" class="text-red-600 hover:text-red-700 font-semibold text-sm transition-colors">Enroll →</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12 scroll-reveal">
            <a href="{{ route('programs.index') }}" class="inline-flex items-center space-x-2 bg-black hover:bg-gray-800 text-white px-8 py-3.5 rounded-xl font-semibold transition-all duration-300">
                <span>Explore All Programs</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- ======================== -->
<!-- 5. WHY JOIN MIBI -->
<!-- ======================== -->
<section class="py-24 bg-gradient-to-br from-black via-gray-900 to-red-900 text-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-reveal">
            <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">Why Choose Us</span>
            <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4">Why Join MIBI?</h2>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">A safe space designed for your emotional transformation journey.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="scroll-reveal bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all duration-300 group text-center">
                <div class="w-20 h-20 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-2xl font-bold mb-3">Confidential & Safe</h3>
                <p class="text-gray-400">Your privacy matters. Every session is completely confidential in a judgment-free space.</p>
            </div>
            <div class="scroll-reveal bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all duration-300 group text-center">
                <div class="w-20 h-20 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="text-2xl font-bold mb-3">Expert Coaches</h3>
                <p class="text-gray-400">Work with certified relationship coaches dedicated to your personal growth and healing.</p>
            </div>
            <div class="scroll-reveal bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all duration-300 group text-center">
                <div class="w-20 h-20 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-2xl font-bold mb-3">Flexible & Accessible</h3>
                <p class="text-gray-400">Voice, video, or in-person sessions scheduled around your life. Pick what works for you.</p>
            </div>
        </div>
    </div>
</section>

<!-- ======================== -->
<!-- 6. TESTIMONIALS -->
<!-- ======================== -->
@if($testimonials->isNotEmpty())
<section class="py-24 bg-gray-50 overflow-hidden" id="testimonials">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-reveal">
            <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Real Stories</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Healing Journeys</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Hear from those who've taken the brave step toward emotional wellness.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($testimonials as $testimonial)
            <div class="testimonial-card bg-white rounded-3xl p-8 shadow-sm border border-gray-100 scroll-reveal">
                <div class="flex items-center mb-5">
                    <div class="w-14 h-14 bg-gradient-to-br from-red-100 to-red-200 rounded-full flex items-center justify-center">
                        <span class="text-red-600 font-bold text-xl">{{ substr($testimonial->author_name, 0, 1) }}</span>
                    </div>
                    <div class="ml-4">
                        <p class="font-bold text-gray-900">{{ $testimonial->author_name }}</p>
                        @if($testimonial->author_title)
                        <p class="text-gray-500 text-sm">{{ $testimonial->author_title }}</p>
                        @endif
                    </div>
                </div>
                <p class="text-gray-600 leading-relaxed">"{{ Str::limit($testimonial->content, 180) }}"</p>
                @if($testimonial->rating)
                <div class="mt-4 flex text-red-500 text-lg">
                    @for($i = 0; $i < $testimonial->rating; $i++) ★ @endfor
                </div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12 scroll-reveal">
            <a href="{{ route('testimonials.index') }}" class="inline-flex items-center space-x-2 bg-red-600 hover:bg-red-700 text-white px-8 py-3.5 rounded-xl font-semibold transition-all duration-300 shadow-lg shadow-red-600/20">
                <span>Read More Stories</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- ======================== -->
<!-- 7. UPCOMING LIVE SESSIONS -->
<!-- ======================== -->
@if($upcomingSessions->isNotEmpty())
<section class="py-24 bg-white overflow-hidden" id="live-sessions">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-reveal">
            <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Join Live</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Upcoming Live Sessions</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Interactive workshops, Q&As, and community discussions led by our expert coaches.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($upcomingSessions as $session)
            <div class="scroll-reveal bg-white rounded-3xl border border-gray-200 p-8 hover:shadow-xl hover:border-red-200 transition-all duration-300 group">
                <div class="flex items-center space-x-2 text-red-600 font-semibold text-sm mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>{{ $session->session_date->format('M j, Y') }}</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition-colors">{{ $session->title }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-6">{{ Str::limit($session->description, 100) }}</p>
                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <div class="text-sm text-gray-500">
                        <span>{{ date('g:i A', strtotime($session->start_time)) }}</span>
                        <span class="mx-2">·</span>
                        <span>{{ $session->registered_count ?? 0 }}/{{ $session->max_participants ?? '∞' }} spots</span>
                    </div>
                    <a href="{{ route('live-sessions.show', $session->slug) }}" class="text-red-600 hover:text-red-700 font-semibold text-sm">Join →</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12 scroll-reveal">
            <a href="{{ route('live-sessions.index') }}" class="inline-flex items-center space-x-2 bg-red-600 hover:bg-red-700 text-white px-8 py-3.5 rounded-xl font-semibold transition-all duration-300 shadow-lg shadow-red-600/20">
                <span>View All Sessions</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- ======================== -->
<!-- 8. CONTACT / CTA SECTION -->
<!-- ======================== -->
<section class="py-24 bg-black text-white overflow-hidden relative">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-red-600 rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="scroll-reveal">
                <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">Get In Touch</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-6 leading-tight">Ready to Begin<br>Your Journey?</h2>
                <p class="text-gray-400 text-lg leading-relaxed mb-8">
                    Take the first step toward healing and transformation. Our team is here to support you every step of the way.
                </p>
                <div class="space-y-4 mb-8">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-red-600/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Email us</p>
                            <p class="font-semibold">{{ $contactEmail }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-red-600/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Call us</p>
                            <p class="font-semibold">{{ $contactPhone }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('contact.index') }}" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 glow-red text-center">
                        Contact Us
                    </a>
                    <a href="{{ route('bookings.create') }}" class="border-2 border-white/20 hover:border-white text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 text-center backdrop-blur-sm">
                        Book a Free Consultation
                    </a>
                </div>
            </div>
            <div class="scroll-reveal lg:block hidden">
                <div class="bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-white/10">
                    <h3 class="text-2xl font-bold mb-6">Send Us a Message</h3>
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" name="name" placeholder="Your Name" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <input type="email" name="email" placeholder="Your Email" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        </div>
                        <input type="text" name="subject" placeholder="Subject" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        <textarea name="message" rows="4" placeholder="Tell us how we can help..." required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent resize-none"></textarea>
                        <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white py-3.5 rounded-xl font-semibold transition-all duration-300">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function closeIntroVideo(){
        const modal = document.getElementById('introVideo');
        const iframe = document.getElementById('introVideoFrame');
        if(!modal) return;
        modal.classList.add('hidden');
        // stop playback by removing src, then restore if needed
        if(iframe){
            const src = iframe.getAttribute('src');
            iframe.setAttribute('src', '');
            setTimeout(()=> iframe.setAttribute('src', src), 300);
        }
    }
    function showIntroVideo(){
        const modal = document.getElementById('introVideo');
        if(!modal) return;
        modal.classList.remove('hidden');
    }
</script>
@endpush

@push('scripts')
<script>
    // Scroll reveal animation
    function revealOnScroll() {
        var elements = document.querySelectorAll('.scroll-reveal');
        var windowHeight = window.innerHeight;
        elements.forEach(function(el) {
            var rect = el.getBoundingClientRect();
            if (rect.top < windowHeight - 60) {
                el.classList.add('revealed');
            }
        });
    }
    document.addEventListener('scroll', revealOnScroll);
    document.addEventListener('DOMContentLoaded', revealOnScroll);
</script>
@endpush
