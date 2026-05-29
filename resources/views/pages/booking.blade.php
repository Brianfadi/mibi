@extends('layouts.app')

@section('title', 'Book a Session — MIBI')

@push('styles')
<style>
.scroll-reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s cubic-bezier(0.16,1,0.3,1); }
.scroll-reveal.revealed { opacity: 1; transform: translateY(0); }
.text-gradient { background: linear-gradient(135deg,#fbbf24,#ef4444,#dc2626); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.step-card:hover .step-num { transform: scale(1.1); }
.step-num { transition: transform 0.4s cubic-bezier(0.16,1,0.3,1); }
.pricing-card { transition: all 0.4s cubic-bezier(0.16,1,0.3,1); }
.pricing-card:hover { transform: translateY(-8px); }
.pricing-card.featured { border-color: #dc2626; }
</style>
@endpush

@section('content')
<!-- ======================== -->
<!-- HERO -->
<!-- ======================== -->
<section class="relative bg-black text-white py-28 overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ asset('images/IMG-20260528-WA0015.jpg') }}" alt="" class="w-full h-full object-cover opacity-25">
    <div class="absolute inset-0 bg-gradient-to-br from-black/80 via-gray-900/80 to-red-900/80"></div>
  </div>
  <div class="absolute inset-0">
    <div class="absolute top-10 left-10 w-80 h-80 bg-red-600 rounded-full blur-3xl opacity-30"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-red-800 rounded-full blur-3xl opacity-20"></div>
  </div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center scroll-reveal">
    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-red-600/30"><span class="text-white font-bold text-3xl">M</span></div>
    <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">MIBI — Where Love Faces Reality</span>
    <h1 class="text-5xl md:text-7xl font-bold mt-4 mb-6 leading-tight">Book Your <span class="text-gradient">Private Session</span></h1>
    <p class="text-gray-400 text-xl max-w-3xl mx-auto leading-relaxed">Take the first step toward healing, clarity, and emotional growth. Your journey starts here.</p>
  </div>
</section>

<!-- ======================== -->
<!-- INTRODUCTION -->
<!-- ======================== -->
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-16 items-center">
      <div class="scroll-reveal">
        <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Welcome to MIBI</span>
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6 leading-tight">Your Healing Journey<br>Begins Here</h2>
        <p class="text-gray-600 text-lg leading-relaxed mb-6">Thank you for choosing MIBI (<strong>M</strong>ake <strong>I</strong>t or <strong>B</strong>reak <strong>I</strong>t). Our booking system makes it easy to schedule private relationship coaching, emotional healing sessions, couples guidance, and personal growth support — from anywhere in the world.</p>
        <div class="grid grid-cols-2 gap-4 mb-8">
          <div class="flex items-center space-x-3 bg-green-50 rounded-xl p-4"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span class="text-sm font-medium text-gray-700">Private & Confidential</span></div>
          <div class="flex items-center space-x-3 bg-green-50 rounded-xl p-4"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span class="text-sm font-medium text-gray-700">Conducted Professionally</span></div>
          <div class="flex items-center space-x-3 bg-green-50 rounded-xl p-4"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span class="text-sm font-medium text-gray-700">Available Online Worldwide</span></div>
          <div class="flex items-center space-x-3 bg-green-50 rounded-xl p-4"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span class="text-sm font-medium text-gray-700">Flexible & Convenient</span></div>
        </div>
        <a href="{{ route('bookings.create') }}" class="inline-flex items-center space-x-2 bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 shadow-lg shadow-red-600/20"><span>Book Your Session Now</span><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></a>
      </div>
      <div class="scroll-reveal">
        <video class="w-full rounded-3xl shadow-xl object-cover aspect-[4/3]" muted loop autoplay playsinline preload="metadata">
          <source src="{{ asset('videos/VID-20260528-WA0020.mp4') }}" type="video/mp4">
        </video>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- WHY BOOK -->
<!-- ======================== -->
<section class="py-24 bg-gray-50 relative overflow-hidden">
  <div class="absolute inset-0 opacity-[0.04]">
    <img src="{{ asset('images/IMG-20260528-WA0016.jpg') }}" alt="" class="w-full h-full object-cover">
  </div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16 scroll-reveal">
      <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Why MIBI</span>
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Why Book a Session With MIBI?</h2>
      <p class="text-gray-600 text-lg max-w-2xl mx-auto">Professional support for individuals and couples navigating life's toughest challenges.</p>
    </div>
    <div class="grid md:grid-cols-3 lg:grid-cols-5 gap-4 scroll-reveal">
      <div class="bg-white rounded-2xl p-5 text-center border border-gray-100 hover:border-red-200 transition-all hover:shadow-md"><span class="text-3xl block mb-2">💔</span><span class="text-sm font-semibold text-gray-800">Heartbreak</span></div>
      <div class="bg-white rounded-2xl p-5 text-center border border-gray-100 hover:border-red-200 transition-all hover:shadow-md"><span class="text-3xl block mb-2">🤔</span><span class="text-sm font-semibold text-gray-800">Relationship Confusion</span></div>
      <div class="bg-white rounded-2xl p-5 text-center border border-gray-100 hover:border-red-200 transition-all hover:shadow-md"><span class="text-3xl block mb-2">😢</span><span class="text-sm font-semibold text-gray-800">Emotional Pain</span></div>
      <div class="bg-white rounded-2xl p-5 text-center border border-gray-100 hover:border-red-200 transition-all hover:shadow-md"><span class="text-3xl block mb-2">🗣️</span><span class="text-sm font-semibold text-gray-800">Communication Problems</span></div>
      <div class="bg-white rounded-2xl p-5 text-center border border-gray-100 hover:border-red-200 transition-all hover:shadow-md"><span class="text-3xl block mb-2">🤝</span><span class="text-sm font-semibold text-gray-800">Trust Issues</span></div>
      <div class="bg-white rounded-2xl p-5 text-center border border-gray-100 hover:border-red-200 transition-all hover:shadow-md"><span class="text-3xl block mb-2">🌱</span><span class="text-sm font-semibold text-gray-800">Breakup Recovery</span></div>
      <div class="bg-white rounded-2xl p-5 text-center border border-gray-100 hover:border-red-200 transition-all hover:shadow-md"><span class="text-3xl block mb-2">💪</span><span class="text-sm font-semibold text-gray-800">Self-Worth Struggles</span></div>
      <div class="bg-white rounded-2xl p-5 text-center border border-gray-100 hover:border-red-200 transition-all hover:shadow-md"><span class="text-3xl block mb-2">⚠️</span><span class="text-sm font-semibold text-gray-800">Toxic Relationships</span></div>
      <div class="bg-white rounded-2xl p-5 text-center border border-gray-100 hover:border-red-200 transition-all hover:shadow-md"><span class="text-3xl block mb-2">😰</span><span class="text-sm font-semibold text-gray-800">Emotional Stress</span></div>
      <div class="bg-white rounded-2xl p-5 text-center border border-gray-100 hover:border-red-200 transition-all hover:shadow-md"><span class="text-3xl block mb-2">📈</span><span class="text-sm font-semibold text-gray-800">Personal Growth</span></div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- SESSION TYPES / PRICING -->
<!-- ======================== -->
<section class="py-24 bg-white" id="pricing">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16 scroll-reveal">
      <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Session Types</span>
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Choose Your Session</h2>
      <p class="text-gray-600 text-lg max-w-2xl mx-auto">Every session is designed to meet you where you are.</p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      @php $icons = ['🫂','💬','🔥','💑','📅']; $i = 0; @endphp
      @foreach($services as $service)
      @php $icon = $service->icon ?? ($icons[$i % count($icons)] ?? '❤️'); $i++; @endphp
      <div class="pricing-card bg-white rounded-3xl p-8 border border-gray-200 hover:shadow-xl scroll-reveal {{ $loop->iteration === 5 ? 'featured ring-2 ring-red-500 relative' : '' }}">
        @if($loop->iteration === 5)
        <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-red-600 to-red-700 text-white text-xs font-bold px-4 py-1 rounded-full">Best Value</div>
        @endif
        <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5"><span class="text-2xl">{{ $icon }}</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $service->title }}</h3>
        <div class="flex items-center text-sm text-gray-500 mb-1"><svg class="w-4 h-4 mr-1.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>{{ $service->duration_label }}</div>
        <div class="text-3xl font-bold text-gray-900 my-4">{{ $service->formatted_price }}</div>
        @if($service->short_description)
        <p class="text-gray-600 text-sm mb-4">{{ $service->short_description }}</p>
        @endif
        @if($service->highlights)
        <ul class="space-y-2 mb-6">
          @foreach($service->highlights as $highlight)
          <li class="flex items-start text-sm text-gray-600"><svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>{{ $highlight }}</li>
          @endforeach
        </ul>
        @endif
        <a href="{{ route('bookings.create') }}?service={{ $service->slug }}" class="block w-full text-center bg-black hover:bg-gray-800 text-white py-3 rounded-xl font-semibold transition-all duration-300">Book This Session</a>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- SESSION FORMATS -->
<!-- ======================== -->
<section class="py-24 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16 scroll-reveal">
      <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Choose Your Format</span>
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Session Formats</h2>
      <p class="text-gray-600 text-lg max-w-2xl mx-auto">Flexible options to match your comfort and preference.</p>
    </div>
    <div class="grid md:grid-cols-4 gap-6">
      <div class="scroll-reveal bg-white rounded-3xl p-8 border border-gray-200 hover:border-red-200 transition-all text-center hover:shadow-lg">
        <div class="w-16 h-16 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mx-auto mb-5"><svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Voice Call</h3>
        <p class="text-gray-600 text-sm">Private audio sessions for comfortable, flexible communication.</p>
      </div>
      <div class="scroll-reveal bg-white rounded-3xl p-8 border border-gray-200 hover:border-red-200 transition-all text-center hover:shadow-lg">
        <div class="w-16 h-16 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mx-auto mb-5"><svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Video Call</h3>
        <p class="text-gray-600 text-sm">Face-to-face online sessions for deeper connection and engagement.</p>
      </div>
      <div class="scroll-reveal bg-white rounded-3xl p-8 border border-gray-200 hover:border-red-200 transition-all text-center hover:shadow-lg">
        <div class="w-16 h-16 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mx-auto mb-5"><svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">One-on-One</h3>
        <p class="text-gray-600 text-sm">Private personalized sessions focused entirely on your individual needs.</p>
      </div>
      <div class="scroll-reveal bg-white rounded-3xl p-8 border border-gray-200 hover:border-red-200 transition-all text-center hover:shadow-lg">
        <div class="w-16 h-16 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mx-auto mb-5"><svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/></svg></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Couples Session</h3>
        <p class="text-gray-600 text-sm">Joint sessions designed for partners seeking healthier communication and understanding.</p>
      </div>
    </div>
    <div class="scroll-reveal mt-12">
      <video class="w-full max-w-3xl mx-auto rounded-2xl shadow-lg object-cover aspect-video" muted loop autoplay playsinline preload="metadata">
        <source src="{{ asset('videos/VID-20260528-WA0021.mp4') }}" type="video/mp4">
      </video>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- HOW IT WORKS -->
<!-- ======================== -->
<section class="py-24 bg-black text-white relative overflow-hidden">
  <div class="absolute inset-0 opacity-10">
    <img src="{{ asset('images/IMG-20260528-WA0016.jpg') }}" alt="" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/60"></div>
  </div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16 scroll-reveal">
      <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">Simple Process</span>
      <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4">How the Booking System Works</h2>
      <p class="text-gray-400 text-lg max-w-2xl mx-auto">Six easy steps to your first session.</p>
    </div>
    <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-4">
      <div class="scroll-reveal text-center"><div class="step-num w-14 h-14 bg-gradient-to-br from-red-600 to-red-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg"><span class="text-white font-bold text-xl">1</span></div><h3 class="font-bold text-sm mb-1">Select Session Type</h3><p class="text-gray-400 text-xs">Choose the coaching that fits your needs</p></div>
      <div class="scroll-reveal text-center"><div class="step-num w-14 h-14 bg-gradient-to-br from-red-600 to-red-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg"><span class="text-white font-bold text-xl">2</span></div><h3 class="font-bold text-sm mb-1">Choose Your Date</h3><p class="text-gray-400 text-xs">Pick from the available calendar</p></div>
      <div class="scroll-reveal text-center"><div class="step-num w-14 h-14 bg-gradient-to-br from-red-600 to-red-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg"><span class="text-white font-bold text-xl">3</span></div><h3 class="font-bold text-sm mb-1">Choose Your Time</h3><p class="text-gray-400 text-xs">Select a convenient time slot</p></div>
      <div class="scroll-reveal text-center"><div class="step-num w-14 h-14 bg-gradient-to-br from-red-600 to-red-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg"><span class="text-white font-bold text-xl">4</span></div><h3 class="font-bold text-sm mb-1">Select Format</h3><p class="text-gray-400 text-xs">Voice, video, or in-person</p></div>
      <div class="scroll-reveal text-center"><div class="step-num w-14 h-14 bg-gradient-to-br from-red-600 to-red-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg"><span class="text-white font-bold text-xl">5</span></div><h3 class="font-bold text-sm mb-1">Make Payment</h3><p class="text-gray-400 text-xs">Secure via M-Pesa, PayPal, or bank</p></div>
      <div class="scroll-reveal text-center"><div class="step-num w-14 h-14 bg-gradient-to-br from-red-600 to-red-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg"><span class="text-white font-bold text-xl">6</span></div><h3 class="font-bold text-sm mb-1">Confirmation</h3><p class="text-gray-400 text-xs">Auto email with session details</p></div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- PAYMENT -->
<!-- ======================== -->
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-16 items-center">
      <div class="scroll-reveal">
        <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Payment</span>
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6">Secure Payment Options</h2>
        <div class="space-y-6">
          <div class="flex items-start space-x-4 p-5 bg-green-50 rounded-2xl"><div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0"><span class="text-green-600 font-bold text-lg">📱</span></div><div><h3 class="font-bold text-gray-900">M-Pesa (Kenya)</h3><p class="text-gray-600 text-sm">Pay directly through M-Pesa. Fast, secure, and reliable.</p></div></div>
          <div class="flex items-start space-x-4 p-5 bg-blue-50 rounded-2xl"><div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0"><span class="text-blue-600 font-bold text-lg">💳</span></div><div><h3 class="font-bold text-gray-900">PayPal</h3><p class="text-gray-600 text-sm">Secure international online payments for clients worldwide.</p></div></div>
          <div class="flex items-start space-x-4 p-5 bg-gray-50 rounded-2xl"><div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center flex-shrink-0"><span class="text-gray-600 font-bold text-lg">🏦</span></div><div><h3 class="font-bold text-gray-900">Bank Transfer</h3><p class="text-gray-600 text-sm">Direct international bank payments available upon request.</p></div></div>
        </div>
      </div>
      <div class="scroll-reveal">
        <img src="{{ asset('images/IMG-20260528-WA0014.jpg') }}" alt="Secure payment options" class="w-full rounded-3xl shadow-lg object-cover aspect-[4/3] mb-6">
        <div class="bg-gray-50 rounded-3xl p-8">
          <h3 class="text-2xl font-bold text-gray-900 mb-6">Payment Process</h3>
          <div class="space-y-4">
            <div class="flex items-center space-x-4"><div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0"><span class="text-red-600 font-bold text-sm">1</span></div><p class="text-gray-700">Client selects session</p></div>
            <div class="flex items-center space-x-4"><div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0"><span class="text-red-600 font-bold text-sm">2</span></div><p class="text-gray-700">Client chooses date and time</p></div>
            <div class="flex items-center space-x-4"><div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0"><span class="text-red-600 font-bold text-sm">3</span></div><p class="text-gray-700">Payment details appear</p></div>
            <div class="flex items-center space-x-4"><div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0"><span class="text-red-600 font-bold text-sm">4</span></div><p class="text-gray-700">Client completes payment</p></div>
            <div class="flex items-center space-x-4"><div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0"><span class="text-red-600 font-bold text-sm">5</span></div><p class="text-gray-700">Payment is verified</p></div>
            <div class="flex items-center space-x-4"><div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0"><svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div><p class="text-gray-700 font-semibold">Booking automatically confirmed</p></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- CONFIRMATION -->
<!-- ======================== -->
<section class="py-24 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16 scroll-reveal">
      <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Auto Confirmation</span>
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">What You Receive</h2>
      <p class="text-gray-600 text-lg max-w-2xl mx-auto">After successful booking, clients automatically receive:</p>
    </div>
    <div class="grid md:grid-cols-3 gap-6 max-w-4xl mx-auto">
      <div class="scroll-reveal flex items-center space-x-3 bg-white rounded-2xl p-5 border border-gray-100"><div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0"><svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div><span class="font-medium text-gray-800">Booking confirmation message</span></div>
      <div class="scroll-reveal flex items-center space-x-3 bg-white rounded-2xl p-5 border border-gray-100"><div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0"><svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div><span class="font-medium text-gray-800">Email confirmation</span></div>
      <div class="scroll-reveal flex items-center space-x-3 bg-white rounded-2xl p-5 border border-gray-100"><div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0"><svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div><span class="font-medium text-gray-800">Session details & meeting link</span></div>
      <div class="scroll-reveal flex items-center space-x-3 bg-white rounded-2xl p-5 border border-gray-100"><div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0"><svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div><span class="font-medium text-gray-800">Date & time reminder</span></div>
      <div class="scroll-reveal flex items-center space-x-3 bg-white rounded-2xl p-5 border border-gray-100"><div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0"><svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div><span class="font-medium text-gray-800">Support contact information</span></div>
      <div class="scroll-reveal flex items-center space-x-3 bg-white rounded-2xl p-5 border border-gray-100"><div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0"><svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div><span class="font-medium text-gray-800">Rescheduling options</span></div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- POLICY -->
<!-- ======================== -->
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid md:grid-cols-2 gap-12">
      <div class="scroll-reveal bg-gray-50 rounded-3xl p-8 lg:p-10">
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Rescheduling & Cancellation</h3>
        <p class="text-gray-600 mb-4">Clients may request rescheduling at least 12–24 hours before the session. Missed sessions without prior communication may not be refundable.</p>
        <div class="flex items-center space-x-3 text-sm text-gray-500"><svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><span>Reschedule at least 12–24 hours before session</span></div>
      </div>
      <div class="scroll-reveal bg-black text-white rounded-3xl p-8 lg:p-10 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"><div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-red-600 rounded-full blur-3xl"></div></div>
        <div class="relative">
          <h3 class="text-2xl font-bold mb-4">Confidentiality & Privacy</h3>
          <p class="text-gray-400 leading-relaxed">MIBI respects client confidentiality. All sessions, discussions, and personal information remain private and protected. Your trust is our foundation.</p>
          <div class="mt-6 flex items-center space-x-3 text-sm text-gray-400"><svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg><span>100% private & confidential</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- FINAL CTA -->
<!-- ======================== -->
<section class="py-24 bg-black text-white relative overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ asset('images/IMG-20260528-WA0015.jpg') }}" alt="" class="w-full h-full object-cover opacity-10">
  </div>
  <div class="absolute inset-0 opacity-20"><div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-red-600 rounded-full blur-3xl"></div></div>
  <div class="relative max-w-4xl mx-auto px-4 text-center scroll-reveal">
    <span class="text-5xl block mb-6">❤️</span>
    <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">You Don't Have to Go Through<br>Emotional Struggles Alone</h2>
    <p class="text-gray-400 text-xl mb-8 max-w-2xl mx-auto">Booking a session with MIBI is the first step toward healing, clarity, emotional growth, and healthier relationships.</p>
    <a href="{{ route('bookings.create') }}" class="inline-flex items-center space-x-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-10 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg shadow-red-600/30 hover:scale-105">
      <span>Book Your Session Today</span>
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
    </a>
    <p class="mt-6 text-gray-500 text-sm">MIBI — Where Love Faces Reality ❤️</p>
  </div>
</section>
@endsection

@push('scripts')
<script>
function revealOnScroll(){var e=document.querySelectorAll('.scroll-reveal'),t=window.innerHeight;e.forEach(function(e){e.getBoundingClientRect().top<t-60&&e.classList.add('revealed')})}document.addEventListener('scroll',revealOnScroll);document.addEventListener('DOMContentLoaded',revealOnScroll);
</script>
@endpush
