@extends('layouts.app')

@section('title', 'Coaching — MIBI')

@push('styles')
<style>
    .scroll-reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
    .scroll-reveal.revealed { opacity: 1; transform: translateY(0); }
    .package-card { transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
    .package-card:hover { transform: translateY(-8px); }
    .text-gradient { background: linear-gradient(135deg, #fbbf24, #ef4444, #dc2626); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
</style>
@endpush

@section('content')
<!-- Hero -->
<section class="bg-black text-white py-24 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10"><div class="absolute top-10 left-10 w-80 h-80 bg-red-600 rounded-full blur-3xl"></div><div class="absolute bottom-10 right-10 w-96 h-96 bg-red-800 rounded-full blur-3xl"></div></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center scroll-reveal">
        <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">Your Transformation Starts Here</span>
        <h1 class="text-5xl md:text-7xl font-bold mt-4 mb-6 leading-tight">Coaching <span class="text-gradient">That Transforms</span></h1>
        <p class="text-gray-400 text-xl max-w-3xl mx-auto leading-relaxed">Whether you need one-on-one support, structured mentorship, or a healing program — we have a path designed for you.</p>
    </div>
</section>

<!-- Coaching Packages -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-reveal">
            <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Our Packages</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Choose Your Path</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Every package is designed with care. Pick what fits your journey.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($services as $service)
            <div class="package-card bg-white rounded-3xl p-8 border border-gray-200 hover:border-red-200 hover:shadow-xl scroll-reveal relative">
                <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5">
                    <span class="text-2xl">{{ $service->icon ?? '❤️' }}</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $service->title }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ $service->short_description ?? $service->description }}</p>
                @if($service->duration)
                <div class="flex items-center text-sm text-gray-500 mb-3">
                    <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ $service->duration }}</span>
                </div>
                @endif
                <div class="flex items-center justify-between pt-4 border-t border-gray-100 mt-auto">
                    <span class="text-red-600 font-bold text-2xl">{{ $service->formatted_price }}</span>
                    <a href="{{ route('bookings.create') }}" class="bg-black hover:bg-gray-800 text-white text-sm px-5 py-2.5 rounded-xl font-semibold transition-all duration-300">Book Now</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Session Types -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-reveal">
            <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">How It Works</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Session Types</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Flexible formats to match your comfort level and schedule.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="scroll-reveal bg-white rounded-3xl p-8 border border-gray-200 hover:border-red-200 transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center mb-5 shadow-lg shadow-red-500/20">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Private Sessions</h3>
                <p class="text-gray-600 leading-relaxed mb-4">One-on-one coaching tailored to your unique situation. Complete privacy, undivided attention from your coach.</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>60–90 minute sessions</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Voice, video, or in-person</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Personalized action plan</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Session notes & resources</li>
                </ul>
            </div>
            <div class="scroll-reveal bg-white rounded-3xl p-8 border border-gray-200 hover:border-red-200 transition-all duration-300 lg:-mt-8">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center mb-5 shadow-lg shadow-red-500/20">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <div class="bg-gradient-to-r from-red-600 to-red-700 text-white text-xs font-bold px-3 py-1 rounded-full inline-block mb-4">Popular</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Monthly Mentorship</h3>
                <p class="text-gray-600 leading-relaxed mb-4">Ongoing support with weekly sessions, check-ins, and a personalized growth roadmap.</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>4 x weekly sessions</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>WhatsApp check-in support</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Progress tracking & journals</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Exclusive resources & tools</li>
                </ul>
            </div>
            <div class="scroll-reveal bg-white rounded-3xl p-8 border border-gray-200 hover:border-red-200 transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center mb-5 shadow-lg shadow-red-500/20">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Healing Programs</h3>
                <p class="text-gray-600 leading-relaxed mb-4">Structured multi-week programs for deep healing — from heartbreak recovery to emotional resilience.</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>6–12 week structured programs</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Workbook & guided exercises</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Community support group</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Graduation & next-steps plan</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Programs Grid -->
@if($programs->isNotEmpty())
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-reveal">
            <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Healing Programs</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Structured Healing Journeys</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Deep-dive programs designed to guide you through every stage of emotional recovery.</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($programs as $program)
            <div class="scroll-reveal bg-gradient-to-br from-gray-50 to-white rounded-3xl p-8 border border-gray-200 hover:border-red-200 transition-all duration-300 hover:shadow-xl group">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center shadow-lg">
                        <span class="text-white text-xl font-bold">{{ $loop->iteration }}</span>
                    </div>
                    @if($program->is_featured)
                    <span class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-black text-xs font-bold px-3 py-1.5 rounded-full">Popular</span>
                    @endif
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition-colors">{{ $program->title }}</h3>
                <p class="text-gray-600 leading-relaxed mb-5">{{ Str::limit($program->description, 200) }}</p>
                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>{{ $program->duration ?? 'Flexible' }}</span>
                        <span class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>{{ $program->price ? 'KES '.number_format($program->price) : 'Free' }}</span>
                    </div>
                    <a href="{{ route('programs.show', $program->slug) }}" class="text-red-600 hover:text-red-700 font-semibold text-sm transition-colors">View Details →</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- What Clients Receive -->
<section class="py-24 bg-black text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-reveal">
            <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">What You Get</span>
            <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4">Every Client Receives</h2>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">We believe in holistic support — not just sessions, but a full ecosystem of care.</p>
        </div>
        <div class="grid md:grid-cols-4 gap-6">
            <div class="scroll-reveal bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 text-center">
                <div class="w-14 h-14 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-4"><svg class="w-7 h-7 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></div>
                <h3 class="font-bold mb-1">Safe Space</h3>
                <p class="text-gray-400 text-sm">Confidential, judgment-free environment</p>
            </div>
            <div class="scroll-reveal bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 text-center">
                <div class="w-14 h-14 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-4"><svg class="w-7 h-7 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></div>
                <h3 class="font-bold mb-1">Action Plan</h3>
                <p class="text-gray-400 text-sm">Personalized roadmap for your goals</p>
            </div>
            <div class="scroll-reveal bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 text-center">
                <div class="w-14 h-14 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-4"><svg class="w-7 h-7 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg></div>
                <h3 class="font-bold mb-1">Resources</h3>
                <p class="text-gray-400 text-sm">Workbooks, journals & guided exercises</p>
            </div>
            <div class="scroll-reveal bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 text-center">
                <div class="w-14 h-14 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-4"><svg class="w-7 h-7 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
                <h3 class="font-bold mb-1">Community</h3>
                <p class="text-gray-400 text-sm">Access to support groups & events</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-red-600 to-red-700 rounded-4xl p-12 md:p-16 text-center text-white scroll-reveal relative overflow-hidden">
            <div class="absolute inset-0 opacity-10"><div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div></div>
            <div class="relative">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Ready to Start Your Journey?</h2>
                <p class="text-white/80 text-lg max-w-2xl mx-auto mb-8">Your first session is just a click away. Take the brave step today.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('bookings.create') }}" class="bg-white text-red-700 hover:bg-gray-100 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-xl">Book Your First Session</a>
                    <a href="{{ route('contact.index') }}" class="border-2 border-white/40 hover:border-white text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300">Talk to Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function revealOnScroll() {
    var els = document.querySelectorAll('.scroll-reveal');
    var h = window.innerHeight;
    els.forEach(function(el) { var r = el.getBoundingClientRect(); if (r.top < h - 60) el.classList.add('revealed'); });
}
document.addEventListener('scroll', revealOnScroll);
document.addEventListener('DOMContentLoaded', revealOnScroll);
</script>
@endpush
