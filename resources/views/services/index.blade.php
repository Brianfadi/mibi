@extends('layouts.app')

@section('title', 'Our Services — MIBI')
@section('meta_description', 'Professional relationship coaching, emotional healing, breakup recovery, couples guidance, and personal growth services at MIBI — Where Love Faces Reality.')

@push('styles')
<style>
.scroll-reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s cubic-bezier(0.16,1,0.3,1); }
.scroll-reveal.revealed { opacity: 1; transform: translateY(0); }
.text-gradient { background: linear-gradient(135deg,#fbbf24,#ef4444,#dc2626); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.service-card { transition: all 0.4s cubic-bezier(0.16,1,0.3,1); }
.service-card:hover { transform: translateY(-6px); }
.service-icon { transition: transform 0.4s cubic-bezier(0.16,1,0.3,1); }
.service-card:hover .service-icon { transform: scale(1.1) rotate(-5deg); }
.anchor-offset { scroll-margin-top: 100px; }
</style>
@endpush

@section('content')
<!-- ======================== -->
<!-- HERO -->
<!-- ======================== -->
<section class="bg-black text-white py-28 relative overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ asset('images/IMG-20260528-WA0015.jpg') }}" alt="" class="w-full h-full object-cover opacity-30">
    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/80 to-black/90"></div>
  </div>
  <div class="absolute inset-0 opacity-20"><div class="absolute top-10 left-10 w-80 h-80 bg-red-600 rounded-full blur-3xl"></div><div class="absolute bottom-10 right-10 w-96 h-96 bg-red-800 rounded-full blur-3xl"></div></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center scroll-reveal">
    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-red-600/30"><span class="text-white font-bold text-3xl">M</span></div>
    <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">MIBI — Make It or Break It</span>
    <h1 class="text-5xl md:text-7xl font-bold mt-4 mb-6 leading-tight">Our <span class="text-gradient">Services</span></h1>
    <p class="text-gray-400 text-xl max-w-3xl mx-auto leading-relaxed">Professional Relationship Guidance, Emotional Healing & Personal Growth</p>
  </div>
</section>

<!-- ======================== -->
<!-- OVERVIEW -->
<!-- ======================== -->
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
      <div class="scroll-reveal">
        <p class="text-gray-600 text-lg leading-relaxed mb-6">At MIBI (<strong>M</strong>ake <strong>I</strong>t or <strong>B</strong>reak <strong>I</strong>t), we provide relationship support, emotional healing, coaching, and personal growth services designed to help individuals and couples build healthier, wiser, and more meaningful relationships.</p>
        <p class="text-gray-600 text-lg leading-relaxed mb-8">Our services are focused on helping people:</p>
        <div class="grid sm:grid-cols-2 gap-3 mb-8">
          <div class="flex items-center space-x-3 bg-green-50 rounded-xl p-3"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span class="text-sm font-medium text-gray-700">Understand relationships better</span></div>
          <div class="flex items-center space-x-3 bg-green-50 rounded-xl p-3"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span class="text-sm font-medium text-gray-700">Heal emotionally</span></div>
          <div class="flex items-center space-x-3 bg-green-50 rounded-xl p-3"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span class="text-sm font-medium text-gray-700">Improve communication</span></div>
          <div class="flex items-center space-x-3 bg-green-50 rounded-xl p-3"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span class="text-sm font-medium text-gray-700">Build confidence</span></div>
          <div class="flex items-center space-x-3 bg-green-50 rounded-xl p-3"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span class="text-sm font-medium text-gray-700">Make healthier emotional decisions</span></div>
          <div class="flex items-center space-x-3 bg-green-50 rounded-xl p-3"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span class="text-sm font-medium text-gray-700">Develop emotional intelligence</span></div>
          <div class="flex items-center space-x-3 bg-green-50 rounded-xl p-3"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span class="text-sm font-medium text-gray-700">Grow mentally, emotionally, and socially</span></div>
          <div class="flex items-center space-x-3 bg-green-50 rounded-xl p-3"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span class="text-sm font-medium text-gray-700">All sessions conducted professionally, privately, and respectfully</span></div>
        </div>
        <div class="flex flex-col sm:flex-row gap-3">
          <a href="#services-nav" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3.5 rounded-xl font-semibold transition-all duration-300 text-center">Explore Our Services</a>
          <a href="{{ route('bookings.create') }}" class="border-2 border-red-600 text-red-600 hover:bg-red-50 px-8 py-3.5 rounded-xl font-semibold transition-all duration-300 text-center">Book a Session</a>
        </div>
      </div>
      <div class="scroll-reveal">
        <div class="relative">
          <img src="{{ asset('images/IMG-20260528-WA0012.jpg') }}" alt="Relationship coaching session" class="w-full rounded-3xl shadow-xl object-cover aspect-[4/3]">
          <div class="absolute -bottom-4 -left-4 bg-gradient-to-br from-red-600 to-red-700 text-white px-6 py-3 rounded-2xl font-bold shadow-lg">
            <span class="text-sm opacity-80">Professional</span>
            <span class="block text-xl">Guidance</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- SERVICE NAVIGATION -->
<!-- ======================== -->
<section id="services-nav" class="py-12 bg-gray-50 border-y border-gray-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-wrap justify-center gap-3">
      <a href="#relationship-coaching" class="px-5 py-2.5 bg-white rounded-full text-sm font-semibold text-gray-700 hover:bg-red-600 hover:text-white transition-all border border-gray-200">Relationship Coaching</a>
      <a href="#breakup-recovery" class="px-5 py-2.5 bg-white rounded-full text-sm font-semibold text-gray-700 hover:bg-red-600 hover:text-white transition-all border border-gray-200">Breakup Recovery</a>
      <a href="#couples-guidance" class="px-5 py-2.5 bg-white rounded-full text-sm font-semibold text-gray-700 hover:bg-red-600 hover:text-white transition-all border border-gray-200">Couples Guidance</a>
      <a href="#personal-growth" class="px-5 py-2.5 bg-white rounded-full text-sm font-semibold text-gray-700 hover:bg-red-600 hover:text-white transition-all border border-gray-200">Personal Growth</a>
      <a href="#live-discussions" class="px-5 py-2.5 bg-white rounded-full text-sm font-semibold text-gray-700 hover:bg-red-600 hover:text-white transition-all border border-gray-200">Live Discussions</a>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- 1. RELATIONSHIP COACHING -->
<!-- ======================== -->
<section id="relationship-coaching" class="py-24 bg-white anchor-offset">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
      <div class="scroll-reveal text-center mb-12">
        <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Section 1</span>
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Relationship Coaching</h2>
        <p class="text-xl text-gray-600 font-medium">Understanding Healthy Relationships</p>
      </div>
      <div class="grid lg:grid-cols-2 gap-10 items-start mb-10">
        <div class="scroll-reveal">
          <p class="text-gray-600 text-lg leading-relaxed mb-6">Relationship Coaching is designed to help individuals understand how relationships work and how to build healthier emotional connections.</p>
          <p class="text-gray-600 text-lg leading-relaxed">Many people struggle with:</p>
        </div>
        <div class="scroll-reveal">
          <img src="{{ asset('images/IMG-20260528-WA0011.jpg') }}" alt="Relationship coaching" class="w-full rounded-2xl shadow-lg object-cover aspect-[3/4]">
        </div>
      </div>
      <div class="scroll-reveal">
        <div class="grid sm:grid-cols-2 gap-3 mb-10">
          <div class="flex items-center space-x-3 bg-gray-50 rounded-xl p-4"><svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg><span class="text-gray-700 font-medium">Communication problems</span></div>
          <div class="flex items-center space-x-3 bg-gray-50 rounded-xl p-4"><svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg><span class="text-gray-700 font-medium">Trust issues</span></div>
          <div class="flex items-center space-x-3 bg-gray-50 rounded-xl p-4"><svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg><span class="text-gray-700 font-medium">Emotional confusion</span></div>
          <div class="flex items-center space-x-3 bg-gray-50 rounded-xl p-4"><svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg><span class="text-gray-700 font-medium">Relationship uncertainty</span></div>
          <div class="flex items-center space-x-3 bg-gray-50 rounded-xl p-4"><svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg><span class="text-gray-700 font-medium">Fear of commitment</span></div>
          <div class="flex items-center space-x-3 bg-gray-50 rounded-xl p-4"><svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg><span class="text-gray-700 font-medium">Toxic relationship patterns</span></div>
          <div class="flex items-center space-x-3 bg-gray-50 rounded-xl p-4"><svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg><span class="text-gray-700 font-medium">Emotional dependency</span></div>
        </div>
        <p class="text-gray-600 text-lg leading-relaxed mb-8">MIBI provides guidance that helps individuals develop healthier approaches to relationships and emotional connections.</p>
      </div>
    </div>

    <!-- 1A. Dating Guidance -->
    <div class="mt-20 scroll-reveal">
      <div class="bg-gradient-to-r from-red-50 to-red-100/50 rounded-3xl p-8 lg:p-10 border border-red-200">
        <div class="grid lg:grid-cols-5 gap-8 items-start">
        <div class="lg:col-span-3">
        <div class="flex items-center space-x-3 mb-6">
          <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center"><span class="text-white font-bold text-xl">1</span></div>
          <h3 class="text-2xl font-bold text-gray-900">Dating Guidance</h3>
        </div>
        <p class="text-gray-700 text-lg mb-6">Helping individuals navigate modern dating with wisdom, maturity, and emotional awareness.</p>
        <div class="grid md:grid-cols-2 gap-8">
          <div>
            <h4 class="font-semibold text-gray-900 mb-3">We Help Clients:</h4>
            <ul class="space-y-2">
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Understand dating intentions</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Identify healthy vs unhealthy relationships</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Recognize red flags</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Build healthy boundaries</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Approach dating with confidence</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Avoid emotional manipulation</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Develop emotional maturity</span></li>
            </ul>
          </div>
          <div class="bg-white/80 rounded-2xl p-6">
            <h4 class="font-semibold text-gray-900 mb-3">Suitable For:</h4>
            <ul class="space-y-3">
              <li class="flex items-center space-x-3 bg-white rounded-xl p-3 border border-gray-100"><span class="w-2 h-2 bg-red-500 rounded-full"></span><span class="text-gray-700">Singles</span></li>
              <li class="flex items-center space-x-3 bg-white rounded-xl p-3 border border-gray-100"><span class="w-2 h-2 bg-red-500 rounded-full"></span><span class="text-gray-700">Young adults</span></li>
              <li class="flex items-center space-x-3 bg-white rounded-xl p-3 border border-gray-100"><span class="w-2 h-2 bg-red-500 rounded-full"></span><span class="text-gray-700">Individuals struggling with dating confusion</span></li>
              <li class="flex items-center space-x-3 bg-white rounded-xl p-3 border border-gray-100"><span class="w-2 h-2 bg-red-500 rounded-full"></span><span class="text-gray-700">People recovering from unhealthy relationships</span></li>
            </ul>
          </div>
        </div>
        <div class="lg:col-span-2">
          <img src="{{ asset('images/IMG-20260528-WA0017.jpg') }}" alt="Dating guidance" class="w-full rounded-2xl shadow-lg object-cover aspect-[3/4]">
        </div>
        </div>
      </div>
    </div>

    <!-- 1B. Communication Coaching -->
    <div class="mt-12 scroll-reveal">
      <div class="bg-white rounded-3xl p-8 lg:p-10 border border-gray-200 shadow-sm">
        <div class="flex items-center space-x-3 mb-6">
          <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center"><span class="text-white font-bold text-xl">2</span></div>
          <h3 class="text-2xl font-bold text-gray-900">Communication Coaching</h3>
        </div>
        <p class="text-gray-700 text-lg mb-4">Healthy relationships depend heavily on communication.</p>
        <p class="text-gray-600 mb-6">Poor communication often leads to misunderstandings, conflict, emotional distance, frustration, and relationship breakdown.</p>
        <div class="grid md:grid-cols-2 gap-8">
          <div>
            <h4 class="font-semibold text-gray-900 mb-3">MIBI Helps Clients Learn:</h4>
            <ul class="space-y-2">
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Effective communication skills</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Active listening</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Emotional expression</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Respectful conversations</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Conflict communication</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Healthy disagreement management</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Emotional control during conversations</span></li>
            </ul>
          </div>
          <div class="bg-green-50 rounded-2xl p-6">
            <h4 class="font-semibold text-gray-900 mb-3">Benefits:</h4>
            <ul class="space-y-3">
              <li class="flex items-center space-x-3"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-gray-700">Better understanding</span></li>
              <li class="flex items-center space-x-3"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-gray-700">Reduced conflict</span></li>
              <li class="flex items-center space-x-3"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-gray-700">Improved emotional connection</span></li>
              <li class="flex items-center space-x-3"><svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-gray-700">Healthier discussions</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- 1C. Trust Rebuilding -->
    <div class="mt-12 scroll-reveal">
      <div class="bg-gradient-to-r from-gray-900 to-black text-white rounded-3xl p-8 lg:p-10">
        <div class="flex items-center space-x-3 mb-6">
          <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center"><span class="text-white font-bold text-xl">3</span></div>
          <h3 class="text-2xl font-bold">Trust Rebuilding</h3>
        </div>
        <p class="text-gray-300 text-lg mb-4">Trust is one of the most important foundations of any relationship.</p>
        <p class="text-gray-400 mb-6">Broken trust can result from betrayal, dishonesty, infidelity, emotional neglect, or broken promises.</p>
        <div class="grid md:grid-cols-2 gap-8">
          <div>
            <h4 class="font-semibold text-white mb-3">MIBI Helps Clients:</h4>
            <ul class="space-y-2">
              <li class="flex items-start space-x-2 text-gray-300"><svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Understand trust issues</span></li>
              <li class="flex items-start space-x-2 text-gray-300"><svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Process emotional pain</span></li>
              <li class="flex items-start space-x-2 text-gray-300"><svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Rebuild emotional safety</span></li>
              <li class="flex items-start space-x-2 text-gray-300"><svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Improve transparency</span></li>
              <li class="flex items-start space-x-2 text-gray-300"><svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Learn healthy trust-building habits</span></li>
              <li class="flex items-start space-x-2 text-gray-300"><svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Decide whether rebuilding is possible</span></li>
            </ul>
          </div>
          <div>
            <h4 class="font-semibold text-white mb-3">Focus Areas:</h4>
            <div class="grid grid-cols-2 gap-3">
              <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center"><span class="block text-red-400 text-2xl mb-1">❤️</span><span class="text-gray-300 text-sm font-medium">Emotional honesty</span></div>
              <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center"><span class="block text-red-400 text-2xl mb-1">🛡️</span><span class="text-gray-300 text-sm font-medium">Accountability</span></div>
              <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center"><span class="block text-red-400 text-2xl mb-1">🚧</span><span class="text-gray-300 text-sm font-medium">Healthy boundaries</span></div>
              <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center"><span class="block text-red-400 text-2xl mb-1">🔒</span><span class="text-gray-300 text-sm font-medium">Emotional security</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 1D. Emotional Support -->
    <div class="mt-12 scroll-reveal">
      <div class="bg-white rounded-3xl p-8 lg:p-10 border border-gray-200 shadow-sm">
        <div class="flex items-center space-x-3 mb-6">
          <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center"><span class="text-white font-bold text-xl">4</span></div>
          <h3 class="text-2xl font-bold text-gray-900">Emotional Support</h3>
        </div>
        <p class="text-gray-700 text-lg mb-6">Sometimes people simply need a safe space to talk, process emotions, and receive guidance.</p>
        <p class="text-gray-600 mb-6">MIBI provides emotional support for individuals dealing with stress, heartbreak, relationship confusion, loneliness, emotional pain, anxiety related to relationships, and emotional exhaustion.</p>
        <div class="grid md:grid-cols-2 gap-8">
          <div class="bg-red-50 rounded-2xl p-6">
            <h4 class="font-semibold text-gray-900 mb-3">Emotional Support Includes:</h4>
            <ul class="space-y-2">
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Safe conversations</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Emotional guidance</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Encouragement</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Mental clarity support</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Healing discussions</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Personal reflection support</span></li>
            </ul>
          </div>
          <div class="flex items-center justify-center">
            <div class="text-center p-8">
              <span class="text-6xl block mb-4">🤝</span>
              <p class="text-gray-600 text-lg font-medium">You don't have to face it alone.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- 2. BREAKUP RECOVERY & EMOTIONAL HEALING -->
<!-- ======================== -->
<section id="breakup-recovery" class="py-24 bg-gray-50 anchor-offset relative overflow-hidden">
  <div class="absolute inset-0 opacity-5 pointer-events-none">
    <img src="{{ asset('images/IMG-20260528-WA0016.jpg') }}" alt="" class="w-full h-full object-cover">
  </div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
    <div class="max-w-4xl mx-auto">
      <div class="scroll-reveal text-center mb-12">
        <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Section 2</span>
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Breakup Recovery & Emotional Healing</h2>
        <p class="text-xl text-gray-600 font-medium">Healing After Emotional Pain</p>
      </div>
      <div class="grid lg:grid-cols-2 gap-10 items-center mb-10">
        <div class="scroll-reveal">
          <p class="text-gray-600 text-lg leading-relaxed mb-6">Breakups, betrayal, rejection, and toxic relationships can deeply affect a person emotionally and mentally.</p>
          <p class="text-gray-600 text-lg leading-relaxed">Many people experience:</p>
        </div>
        <div class="scroll-reveal">
          <img src="{{ asset('images/IMG-20260528-WA0018.jpg') }}" alt="Emotional healing" class="w-full rounded-2xl shadow-lg object-cover aspect-[3/4]">
        </div>
      </div>
      <div class="scroll-reveal">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-10">
          <div class="bg-white rounded-xl p-4 border border-gray-200 text-center"><span class="text-2xl block mb-1">😔</span><span class="text-gray-700 font-medium text-sm">Depression</span></div>
          <div class="bg-white rounded-xl p-4 border border-gray-200 text-center"><span class="text-2xl block mb-1">💔</span><span class="text-gray-700 font-medium text-sm">Loss of confidence</span></div>
          <div class="bg-white rounded-xl p-4 border border-gray-200 text-center"><span class="text-2xl block mb-1">🤯</span><span class="text-gray-700 font-medium text-sm">Overthinking</span></div>
          <div class="bg-white rounded-xl p-4 border border-gray-200 text-center"><span class="text-2xl block mb-1">😰</span><span class="text-gray-700 font-medium text-sm">Anxiety</span></div>
          <div class="bg-white rounded-xl p-4 border border-gray-200 text-center"><span class="text-2xl block mb-1">🖤</span><span class="text-gray-700 font-medium text-sm">Emotional trauma</span></div>
          <div class="bg-white rounded-xl p-4 border border-gray-200 text-center"><span class="text-2xl block mb-1">🚶</span><span class="text-gray-700 font-medium text-sm">Difficulty moving on</span></div>
          <div class="bg-white rounded-xl p-4 border border-gray-200 text-center"><span class="text-2xl block mb-1">🏠</span><span class="text-gray-700 font-medium text-sm">Isolation</span></div>
          <div class="bg-white rounded-xl p-4 border border-gray-200 text-center"><span class="text-2xl block mb-1">🌊</span><span class="text-gray-700 font-medium text-sm">Emotional instability</span></div>
        </div>
        <p class="text-gray-600 text-lg leading-relaxed mb-8">MIBI helps individuals heal emotionally and rebuild their lives with confidence and clarity.</p>
      </div>
    </div>

    <!-- 2A. Healing Sessions -->
    <div class="mt-12 scroll-reveal">
      <div class="bg-white rounded-3xl p-8 lg:p-10 border border-gray-200 shadow-sm">
        <div class="grid lg:grid-cols-5 gap-8 items-start">
        <div class="lg:col-span-3">
        <div class="flex items-center space-x-3 mb-6">
          <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center"><span class="text-white font-bold text-xl">1</span></div>
          <h3 class="text-2xl font-bold text-gray-900">Healing Sessions</h3>
        </div>
        <p class="text-gray-700 text-lg mb-6">Private sessions designed to help individuals process emotional pain in a healthy way.</p>
        <div class="grid md:grid-cols-2 gap-8">
          <div>
            <h4 class="font-semibold text-gray-900 mb-3">Sessions Focus On:</h4>
            <ul class="space-y-2">
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Emotional release</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Mental clarity</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Self-understanding</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Healing strategies</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Acceptance & recovery</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Letting go in healthy ways</span></li>
            </ul>
          </div>
          <div class="bg-gray-50 rounded-2xl p-6">
            <h4 class="font-semibold text-gray-900 mb-3">Goals:</h4>
            <ul class="space-y-3">
              <li class="flex items-center space-x-3 bg-white rounded-xl p-3 border border-gray-100"><span class="w-3 h-3 bg-red-500 rounded-full"></span><span class="text-gray-700">Emotional stabilization</span></li>
              <li class="flex items-center space-x-3 bg-white rounded-xl p-3 border border-gray-100"><span class="w-3 h-3 bg-red-500 rounded-full"></span><span class="text-gray-700">Healing support</span></li>
              <li class="flex items-center space-x-3 bg-white rounded-xl p-3 border border-gray-100"><span class="w-3 h-3 bg-red-500 rounded-full"></span><span class="text-gray-700">Healthy recovery process</span></li>
            </ul>
          </div>
        </div>
        <div class="lg:col-span-2">
          <img src="{{ asset('images/IMG-20260528-WA0019.jpg') }}" alt="Healing sessions" class="w-full rounded-2xl shadow-lg object-cover aspect-[3/4]">
        </div>
        </div>
      </div>
    </div>

    <!-- 2B. Confidence Rebuilding -->
    <div class="mt-12 scroll-reveal">
      <div class="bg-gradient-to-r from-red-50 to-red-100/50 rounded-3xl p-8 lg:p-10 border border-red-200">
        <div class="flex items-center space-x-3 mb-6">
          <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center"><span class="text-white font-bold text-xl">2</span></div>
          <h3 class="text-2xl font-bold text-gray-900">Confidence Rebuilding</h3>
        </div>
        <p class="text-gray-700 text-lg mb-6">Heartbreak can damage confidence and self-worth. MIBI helps individuals regain self-confidence, rebuild self-esteem, develop self-respect, restore emotional strength, and improve self-image.</p>
        <div class="grid md:grid-cols-2 gap-8">
          <div>
            <h4 class="font-semibold text-gray-900 mb-3">MIBI helps individuals:</h4>
            <ul class="space-y-2">
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Regain self-confidence</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Rebuild self-esteem</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Develop self-respect</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Restore emotional strength</span></li>
              <li class="flex items-start space-x-2 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Improve self-image</span></li>
            </ul>
          </div>
          <div>
            <h4 class="font-semibold text-gray-900 mb-3">Areas Covered:</h4>
            <div class="grid grid-cols-2 gap-3">
              <div class="bg-white rounded-xl p-4 text-center border border-gray-200"><span class="text-2xl block mb-1">💎</span><span class="text-gray-700 text-sm font-medium">Self-worth</span></div>
              <div class="bg-white rounded-xl p-4 text-center border border-gray-200"><span class="text-2xl block mb-1">🧑</span><span class="text-gray-700 text-sm font-medium">Personal identity</span></div>
              <div class="bg-white rounded-xl p-4 text-center border border-gray-200"><span class="text-2xl block mb-1">🌿</span><span class="text-gray-700 text-sm font-medium">Emotional independence</span></div>
              <div class="bg-white rounded-xl p-4 text-center border border-gray-200"><span class="text-2xl block mb-1">🧠</span><span class="text-gray-700 text-sm font-medium">Positive mindset</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 2C. Emotional Recovery -->
    <div class="mt-12 scroll-reveal">
      <div class="bg-gradient-to-br from-red-900 via-red-800 to-black text-white rounded-3xl p-8 lg:p-10">
        <div class="grid lg:grid-cols-2 gap-8 items-center">
          <div>
            <div class="flex items-center space-x-3 mb-6">
              <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center"><span class="text-white font-bold text-xl">3</span></div>
              <h3 class="text-2xl font-bold">Emotional Recovery</h3>
            </div>
            <p class="text-gray-200 text-lg mb-6">Emotional healing takes time, patience, and support. MIBI guides individuals through recovery after betrayal, moving on after heartbreak, emotional growth, developing emotional strength, and finding peace after painful experiences.</p>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
              <h4 class="font-semibold text-white mb-3">Recovery Focus:</h4>
              <ul class="space-y-3">
                <li class="flex items-center space-x-3"><span class="w-2 h-2 bg-red-400 rounded-full"></span><span class="text-gray-200">Healing emotionally</span></li>
                <li class="flex items-center space-x-3"><span class="w-2 h-2 bg-red-400 rounded-full"></span><span class="text-gray-200">Managing painful emotions</span></li>
                <li class="flex items-center space-x-3"><span class="w-2 h-2 bg-red-400 rounded-full"></span><span class="text-gray-200">Building emotional resilience</span></li>
                <li class="flex items-center space-x-3"><span class="w-2 h-2 bg-red-400 rounded-full"></span><span class="text-gray-200">Developing healthier future relationship habits</span></li>
              </ul>
            </div>
          </div>
          <div class="relative">
            <video class="w-full rounded-2xl shadow-lg" controls preload="metadata" poster="{{ asset('images/IMG-20260528-WA0015.jpg') }}">
              <source src="{{ asset('videos/VID-20260528-WA0020.mp4') }}" type="video/mp4">
            </video>
            <div class="absolute top-3 left-3 bg-black/60 backdrop-blur-sm text-white text-xs font-medium px-3 py-1.5 rounded-full">Healing journey</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- 3. COUPLES GUIDANCE -->
<!-- ======================== -->
<section id="couples-guidance" class="py-24 bg-white anchor-offset">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto scroll-reveal text-center mb-12">
      <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Section 3</span>
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Couples Guidance</h2>
      <p class="text-xl text-gray-600 font-medium">Helping Couples Build Healthier Relationships</p>
    </div>
    <div class="max-w-4xl mx-auto scroll-reveal mb-16">
      <p class="text-gray-600 text-lg leading-relaxed text-center">Relationships often face challenges that require communication, understanding, patience, and emotional maturity. MIBI provides couples guidance sessions designed to help partners understand each other better and improve their relationship dynamics.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
      <div class="scroll-reveal bg-white rounded-3xl border border-gray-200 service-card hover:shadow-xl overflow-hidden">
        <div class="aspect-video bg-gray-100 overflow-hidden">
          <video class="w-full h-full object-cover" muted loop preload="metadata">
            <source src="{{ asset('videos/VID-20260528-WA0022.mp4') }}" type="video/mp4">
          </video>
        </div>
        <div class="p-8">
        <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">🤝</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-4">Conflict Resolution</h3>
        <p class="text-gray-600 mb-4">Conflict is normal in relationships, but unhealthy conflict can damage emotional connection.</p>
        <h4 class="font-semibold text-gray-900 text-sm mb-2">MIBI helps couples:</h4>
        <ul class="space-y-1.5 text-sm text-gray-600">
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Resolve disagreements respectfully</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Reduce toxic arguments</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Understand emotional triggers</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Improve emotional control</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Build healthier problem-solving skills</span></li>
        </ul>
      </div>
      </div>

      <div class="scroll-reveal bg-white rounded-3xl border border-gray-200 service-card hover:shadow-xl overflow-hidden">
        <div class="aspect-video bg-gray-100 overflow-hidden">
          <video class="w-full h-full object-cover" muted loop preload="metadata">
            <source src="{{ asset('videos/VID-20260528-WA0023.mp4') }}" type="video/mp4">
          </video>
        </div>
        <div class="p-8">
        <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">💬</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-4">Communication Improvement</h3>
        <p class="text-gray-600 mb-4">Poor communication is one of the leading causes of relationship problems.</p>
        <h4 class="font-semibold text-gray-900 text-sm mb-2">MIBI helps couples:</h4>
        <ul class="space-y-1.5 text-sm text-gray-600">
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Express feelings clearly</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Listen actively</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Understand each other emotionally</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Improve emotional connection</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Reduce misunderstandings</span></li>
        </ul>
      </div>
      </div>

      <div class="scroll-reveal bg-white rounded-3xl p-8 border border-gray-200 service-card hover:shadow-xl">
        <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">🧠</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-4">Relationship Understanding</h3>
        <p class="text-gray-600 mb-4">Many couples struggle because they do not fully understand each other's emotional needs, personalities, or expectations.</p>
        <h4 class="font-semibold text-gray-900 text-sm mb-2">MIBI helps couples:</h4>
        <ul class="space-y-1.5 text-sm text-gray-600">
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Understand relationship dynamics</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Recognize unhealthy patterns</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Improve emotional awareness</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Strengthen partnership understanding</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Develop healthier relationship habits</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- 4. PERSONAL GROWTH COACHING -->
<!-- ======================== -->
<section id="personal-growth" class="py-24 bg-gray-50 anchor-offset">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto scroll-reveal text-center mb-12">
      <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Section 4</span>
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Personal Growth Coaching</h2>
      <p class="text-xl text-gray-600 font-medium">Becoming a Better Version of Yourself</p>
    </div>
    <div class="max-w-4xl mx-auto scroll-reveal mb-16">
      <p class="text-gray-600 text-lg leading-relaxed text-center">Healthy relationships begin with healthy individuals. Personal Growth Coaching helps individuals develop emotional maturity, self-awareness, confidence, and healthier life perspectives.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
      <div class="scroll-reveal bg-white rounded-3xl p-8 border border-gray-200 service-card hover:shadow-xl">
        <div class="w-14 h-14 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">💎</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-4">Self-Worth Development</h3>
        <p class="text-gray-600 mb-4">Many people struggle with low self-esteem, emotional dependency, seeking validation from others, and fear of rejection.</p>
        <h4 class="font-semibold text-gray-900 text-sm mb-2">MIBI helps individuals:</h4>
        <ul class="space-y-1.5 text-sm text-gray-600">
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Discover personal value</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Build self-respect</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Develop emotional independence</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Improve self-confidence</span></li>
        </ul>
      </div>

      <div class="scroll-reveal bg-white rounded-3xl p-8 border border-gray-200 service-card hover:shadow-xl">
        <div class="w-14 h-14 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">🧠</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-4">Emotional Intelligence</h3>
        <p class="text-gray-600 mb-4">Emotional intelligence is the ability to understand and manage emotions effectively.</p>
        <h4 class="font-semibold text-gray-900 text-sm mb-2">MIBI helps individuals develop:</h4>
        <ul class="space-y-1.5 text-sm text-gray-600">
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Emotional awareness</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Self-control</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Empathy</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Healthy emotional responses</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Better communication skills</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Emotional maturity</span></li>
        </ul>
      </div>

      <div class="scroll-reveal bg-white rounded-3xl p-8 border border-gray-200 service-card hover:shadow-xl">
        <div class="w-14 h-14 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">💪</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-4">Confidence Building</h3>
        <p class="text-gray-600 mb-4">Confidence affects how people communicate, love, make decisions, and handle life challenges.</p>
        <h4 class="font-semibold text-gray-900 text-sm mb-2">MIBI helps individuals:</h4>
        <ul class="space-y-1.5 text-sm text-gray-600">
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Build confidence</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Improve self-expression</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Overcome fear and insecurity</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Develop a positive mindset</span></li>
          <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Become emotionally stronger</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- 5. LIVE RELATIONSHIP DISCUSSIONS -->
<!-- ======================== -->
<section id="live-discussions" class="py-24 bg-black text-white anchor-offset">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto scroll-reveal text-center mb-12">
      <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">Section 5</span>
      <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4">Live Relationship Discussions</h2>
      <p class="text-xl text-gray-300 font-medium">Real Conversations About Relationships & Life</p>
    </div>
    <div class="max-w-4xl mx-auto scroll-reveal mb-12">
      <p class="text-gray-400 text-lg leading-relaxed text-center">MIBI hosts interactive live discussions focused on relationship realities, emotional growth, healing, communication, and modern relationship challenges. These sessions create opportunities for open discussions, learning, community interaction, sharing experiences, and relationship education.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
      <div class="scroll-reveal bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all">
        <div class="w-16 h-16 bg-red-600/20 rounded-2xl flex items-center justify-center mx-auto mb-5"><span class="text-3xl">📱</span></div>
        <h3 class="text-xl font-bold text-center mb-2">TikTok Live</h3>
        <p class="text-gray-400 text-sm text-center mb-4">Interactive relationship discussions, Q&A sessions, audience engagement, and emotional wellness conversations.</p>
        <div class="space-y-1.5 text-sm text-gray-400">
          <p class="text-gray-300 font-medium mb-2">Topics Include:</p>
          <div class="flex flex-wrap gap-2 justify-center">
            <span class="bg-white/10 px-3 py-1 rounded-full text-xs">Dating realities</span>
            <span class="bg-white/10 px-3 py-1 rounded-full text-xs">Red flags</span>
            <span class="bg-white/10 px-3 py-1 rounded-full text-xs">Trust issues</span>
            <span class="bg-white/10 px-3 py-1 rounded-full text-xs">Heartbreak</span>
            <span class="bg-white/10 px-3 py-1 rounded-full text-xs">Relationship lessons</span>
            <span class="bg-white/10 px-3 py-1 rounded-full text-xs">Self-worth</span>
            <span class="bg-white/10 px-3 py-1 rounded-full text-xs">Emotional healing</span>
          </div>
        </div>
      </div>

      <div class="scroll-reveal bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all">
        <div class="w-16 h-16 bg-red-600/20 rounded-2xl flex items-center justify-center mx-auto mb-5"><span class="text-3xl">📸</span></div>
        <h3 class="text-xl font-bold text-center mb-2">Instagram Live</h3>
        <p class="text-gray-400 text-sm text-center mb-4">Visual discussions, relationship talks, guest conversations, motivational discussions, and emotional wellness content.</p>
        <div class="h-20 flex items-center justify-center">
          <a href="{{ $socialLinks['instagram'] ?? '#' }}" target="_blank" class="text-red-400 hover:text-red-300 font-semibold text-sm underline underline-offset-4">Follow us on Instagram →</a>
        </div>
      </div>

      <div class="scroll-reveal bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all">
        <div class="w-16 h-16 bg-red-600/20 rounded-2xl flex items-center justify-center mx-auto mb-5"><span class="text-3xl">💻</span></div>
        <h3 class="text-xl font-bold text-center mb-2">Zoom Sessions</h3>
        <p class="text-gray-400 text-sm text-center mb-4">Private and group relationship coaching sessions designed for deeper discussions, structured programs, and interactive learning.</p>
        <div class="mb-4 rounded-xl overflow-hidden">
          <video class="w-full rounded-lg" controls preload="metadata">
            <source src="{{ asset('videos/VID-20260528-WA0021.mp4') }}" type="video/mp4">
          </video>
        </div>
        <p class="text-gray-300 font-medium text-sm mb-2">Zoom Sessions Include:</p>
        <div class="flex flex-wrap gap-2 justify-center">
          <span class="bg-white/10 px-3 py-1 rounded-full text-xs">Workshops</span>
          <span class="bg-white/10 px-3 py-1 rounded-full text-xs">Group healing discussions</span>
          <span class="bg-white/10 px-3 py-1 rounded-full text-xs">Couples sessions</span>
          <span class="bg-white/10 px-3 py-1 rounded-full text-xs">Coaching programs</span>
          <span class="bg-white/10 px-3 py-1 rounded-full text-xs">Emotional growth training</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- WHY CHOOSE MIBI -->
<!-- ======================== -->
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto scroll-reveal text-center mb-16">
      <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Why MIBI</span>
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Why Choose MIBI Services</h2>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="scroll-reveal bg-gray-50 rounded-3xl p-8 text-center border border-gray-100 hover:border-red-200 transition-all">
        <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mx-auto mb-5"><span class="text-3xl">🤫</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Confidential & Respectful</h3>
        <p class="text-gray-600 text-sm">All sessions and discussions are handled privately and respectfully.</p>
      </div>
      <div class="scroll-reveal bg-gray-50 rounded-3xl p-8 text-center border border-gray-100 hover:border-red-200 transition-all">
        <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mx-auto mb-5"><span class="text-3xl">🌍</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Flexible & Accessible</h3>
        <p class="text-gray-600 text-sm">Sessions available online worldwide through Voice Calls, Video Calls, WhatsApp, Zoom, and Google Meet.</p>
      </div>
      <div class="scroll-reveal bg-gray-50 rounded-3xl p-8 text-center border border-gray-100 hover:border-red-200 transition-all">
        <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mx-auto mb-5"><span class="text-3xl">🫂</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Supportive Environment</h3>
        <p class="text-gray-600 text-sm">MIBI creates a safe and non-judgmental environment where individuals can heal, learn, and grow.</p>
      </div>
      <div class="scroll-reveal bg-gray-50 rounded-3xl p-8 text-center border border-gray-100 hover:border-red-200 transition-all">
        <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mx-auto mb-5"><span class="text-3xl">📈</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Growth-Focused</h3>
        <p class="text-gray-600 text-sm">Our focus is not only relationships — we focus on emotional wellness, personal growth, healing, confidence, and healthier living.</p>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- CTA -->
<!-- ======================== -->
<section class="py-24 bg-black text-white relative overflow-hidden">
  <div class="absolute inset-0 opacity-10"><div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-red-600 rounded-full blur-3xl"></div></div>
  <div class="relative max-w-4xl mx-auto px-4 text-center scroll-reveal">
    <span class="text-5xl block mb-6">❤️</span>
    <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Ready to Start Your<br>Healing Journey?</h2>
    <p class="text-gray-400 text-xl mb-8 max-w-2xl mx-auto">Book a session today and take the first step toward healthier relationships and emotional wellness.</p>
    <a href="{{ route('bookings.create') }}" class="inline-flex items-center space-x-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-10 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg shadow-red-600/30 hover:scale-105">
      <span>Book Your Session</span>
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
    </a>
    <p class="mt-6 text-gray-500 text-sm">MIBI — Where Love Faces Reality ❤️</p>
  </div>
</section>

<!-- ======================== -->
<!-- FAQs -->
<!-- ======================== -->
@if(isset($faqs) && $faqs->isNotEmpty())
<section class="py-24 bg-white">
  <div class="max-w-3xl mx-auto px-4">
    <div class="text-center mb-12 scroll-reveal">
      <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Got Questions?</span>
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-4">Frequently Asked Questions</h2>
    </div>
    <div class="space-y-4 scroll-reveal">
      @foreach($faqs as $faq)
      <details class="border border-gray-200 rounded-xl p-5 group open:border-red-200 open:bg-red-50/30 transition-all">
        <summary class="font-semibold text-gray-900 cursor-pointer flex justify-between items-center">
          <span>{{ $faq->question }}</span>
          <svg class="w-5 h-5 text-gray-500 group-open:rotate-180 transition-transform flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </summary>
        <p class="mt-4 text-gray-600 leading-relaxed">{{ $faq->answer }}</p>
      </details>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection

@push('scripts')
<script>
function revealOnScroll(){var e=document.querySelectorAll('.scroll-reveal'),t=window.innerHeight;e.forEach(function(e){e.getBoundingClientRect().top<t-60&&e.classList.add('revealed')})}document.addEventListener('scroll',revealOnScroll);document.addEventListener('DOMContentLoaded',revealOnScroll);
</script>
@endpush