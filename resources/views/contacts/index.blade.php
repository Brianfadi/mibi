@extends('layouts.app')

@section('title', 'Contact Us — MIBI')
@section('meta_description', 'Get in touch with MIBI. We are here to support you on your healing journey.')

@push('styles')
<style>
.text-gradient { background: linear-gradient(135deg,#fbbf24,#ef4444,#dc2626); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.reveal { opacity: 0; transition: all 1s cubic-bezier(0.16, 1, 0.3, 1); }
.reveal-left { transform: translateX(-60px); }
.reveal-right { transform: translateX(60px); }
.reveal-up { transform: translateY(50px); }
.reveal-scale { transform: scale(0.9); }
.reveal.revealed { opacity: 1; transform: translateX(0) translateY(0) scale(1); }
.stagger-1 { transition-delay: 0.1s; }
.stagger-2 { transition-delay: 0.2s; }
.stagger-3 { transition-delay: 0.3s; }
.stagger-4 { transition-delay: 0.4s; }
.stagger-5 { transition-delay: 0.5s; }
</style>
@endpush

@section('content')
<!-- Hero -->
<section class="relative bg-black text-white py-28 overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ asset('images/IMG-20260528-WA0019.jpg') }}" alt="" class="w-full h-full object-cover opacity-25">
    <div class="absolute inset-0 bg-gradient-to-br from-black/80 via-gray-900/80 to-red-900/80"></div>
  </div>
  <div class="absolute inset-0 opacity-30">
    <div class="absolute top-10 left-10 w-80 h-80 bg-red-600 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-red-800 rounded-full blur-3xl"></div>
  </div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal reveal-up">
    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-red-600/30">
      <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
    </div>
    <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">Get in Touch</span>
    <h1 class="text-5xl md:text-7xl font-bold mt-4 mb-6 leading-tight">We're <span class="text-gradient">Here</span> for You</h1>
    <p class="text-gray-400 text-xl max-w-3xl mx-auto leading-relaxed">Whether you have a question, need support, or want to begin your healing journey — reach out anytime.</p>
  </div>
</section>

<!-- Contact + Info -->
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-5 gap-12">
      <!-- Form -->
      <div class="lg:col-span-3 reveal reveal-left">
        <div class="bg-white rounded-3xl p-8 md:p-10 border border-gray-200 shadow-sm">
          <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Send Us a Message</h2>
          <p class="text-gray-500 mb-8">Fill out the form and we'll get back to you within 24 hours.</p>
          <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid md:grid-cols-2 gap-5">
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Your Name *</label>
                <input type="text" name="name" id="name" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent @error('name') border-red-500 @enderror"
                       value="{{ old('name') }}">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
              </div>
              <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email *</label>
                <input type="email" name="email" id="email" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent @error('email') border-red-500 @enderror"
                       value="{{ old('email') }}">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
              </div>
            </div>
            <div>
              <label for="phone" class="block text-sm font-medium text-gray-700 mb-1.5">Phone</label>
              <input type="tel" name="phone" id="phone"
                     class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent"
                     value="{{ old('phone') }}">
            </div>
            <div>
              <label for="subject" class="block text-sm font-medium text-gray-700 mb-1.5">Subject</label>
              <input type="text" name="subject" id="subject"
                     class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent"
                     value="{{ old('subject') }}">
            </div>
            <div>
              <label for="message" class="block text-sm font-medium text-gray-700 mb-1.5">Message *</label>
              <textarea name="message" id="message" rows="5" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent resize-none @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
              @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-6 py-3.5 rounded-xl font-semibold transition-all duration-300 shadow-lg shadow-red-600/30 hover:scale-[1.02]">
              Send Message
            </button>
          </form>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="lg:col-span-2 space-y-8">
        <!-- Contact Cards -->
        <div class="reveal reveal-right stagger-1 bg-white rounded-3xl border border-gray-200 p-6 shadow-sm">
          <h3 class="font-bold text-gray-900 mb-5 flex items-center space-x-2">
            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            <span>Contact Info</span>
          </h3>
          <div class="space-y-5">
            <div class="flex items-start space-x-4">
              <div class="w-11 h-11 bg-red-50 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
              </div>
              <div>
                <p class="font-semibold text-gray-900 text-sm">WhatsApp</p>
                <a href="https://wa.me/{{ preg_replace('/\D/', '', config('services.whatsapp.number') ?? '254700000000') }}" class="text-red-600 hover:text-red-700 text-sm">Chat with us now →</a>
              </div>
            </div>
            <div class="flex items-start space-x-4">
              <div class="w-11 h-11 bg-red-50 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
              </div>
              <div>
                <p class="font-semibold text-gray-900 text-sm">Email</p>
                <a href="mailto:hello@mibi.africa" class="text-red-600 hover:text-red-700 text-sm">hello@mibi.africa</a>
              </div>
            </div>
            <div class="flex items-start space-x-4">
              <div class="w-11 h-11 bg-red-50 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              </div>
              <div>
                <p class="font-semibold text-gray-900 text-sm">Location</p>
                <p class="text-gray-500 text-sm">Nairobi, Kenya</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Image Card -->
        <div class="reveal reveal-right stagger-2 rounded-3xl overflow-hidden shadow-sm">
          <img src="{{ asset('images/IMG-20260528-WA0012.jpg') }}" alt="MIBI contact" class="w-full object-cover aspect-[4/3]">
        </div>

        <!-- Social Cards -->
        <div class="reveal reveal-right stagger-3 bg-white rounded-3xl border border-gray-200 p-6 shadow-sm">
          <h3 class="font-bold text-gray-900 mb-4 flex items-center space-x-2">
            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <span>Follow Us</span>
          </h3>
          <div class="grid grid-cols-4 gap-3">
            <a href="#" class="flex flex-col items-center p-3 bg-gray-50 rounded-xl hover:bg-red-50 hover:text-red-600 transition-all group">
              <svg class="w-5 h-5 text-gray-600 group-hover:text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
              <span class="text-[10px] text-gray-500 group-hover:text-red-600 mt-1">TikTok</span>
            </a>
            <a href="#" class="flex flex-col items-center p-3 bg-gray-50 rounded-xl hover:bg-red-50 hover:text-red-600 transition-all group">
              <svg class="w-5 h-5 text-gray-600 group-hover:text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
              <span class="text-[10px] text-gray-500 group-hover:text-red-600 mt-1">Instagram</span>
            </a>
            <a href="#" class="flex flex-col items-center p-3 bg-gray-50 rounded-xl hover:bg-red-50 hover:text-red-600 transition-all group">
              <svg class="w-5 h-5 text-gray-600 group-hover:text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
              <span class="text-[10px] text-gray-500 group-hover:text-red-600 mt-1">Facebook</span>
            </a>
            <a href="#" class="flex flex-col items-center p-3 bg-gray-50 rounded-xl hover:bg-red-50 hover:text-red-600 transition-all group">
              <svg class="w-5 h-5 text-gray-600 group-hover:text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
              <span class="text-[10px] text-gray-500 group-hover:text-red-600 mt-1">YouTube</span>
            </a>
          </div>
        </div>

        <!-- Video Card -->
        <div class="reveal reveal-right stagger-4 rounded-3xl overflow-hidden shadow-sm">
          <video class="w-full object-cover aspect-video" muted loop autoplay playsinline preload="metadata">
            <source src="{{ asset('videos/VID-20260528-WA0023.mp4') }}" type="video/mp4">
          </video>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Info Strip -->
<section class="relative bg-[#111111] border-y border-red-800/30 py-14">
  <div class="absolute inset-0 bg-gradient-to-r from-red-900/10 via-transparent to-red-900/10 pointer-events-none"></div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid md:grid-cols-3 gap-8 text-center reveal reveal-up">
      <div class="stagger-1">
        <div class="w-12 h-12 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-3">
          <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <h4 class="text-white font-semibold">Fast Response</h4>
        <p class="text-gray-400 text-sm mt-1">We reply within 24 hours</p>
      </div>
      <div class="stagger-2">
        <div class="w-12 h-12 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-3">
          <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <h4 class="text-white font-semibold">100% Confidential</h4>
        <p class="text-gray-400 text-sm mt-1">Your privacy is our priority</p>
      </div>
      <div class="stagger-3">
        <div class="w-12 h-12 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-3">
          <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <h4 class="text-white font-semibold">Global Reach</h4>
        <p class="text-gray-400 text-sm mt-1">Available online worldwide</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-20 bg-gray-50">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal reveal-up">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Prefer to <span class="text-gradient">Book a Session</span> Directly?</h2>
    <p class="text-gray-600 text-lg max-w-2xl mx-auto mb-8">Skip the form and go straight to booking a one-on-one session with a certified MIBI coach.</p>
    <a href="{{ route('bookings.create') }}" class="inline-flex items-center space-x-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-10 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg shadow-red-600/30 hover:scale-105">
      <span>Book a Session</span>
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
    </a>
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
});
</script>
@endpush