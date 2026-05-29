@extends('layouts.app')

@section('title', 'Thank You — MIBI Registration')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-black via-gray-900 to-red-900 text-white flex items-center">
  <div class="max-w-2xl mx-auto px-4 text-center">
    <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center mx-auto mb-8 shadow-lg shadow-green-500/30">
      <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
    </div>
    <h1 class="text-4xl md:text-5xl font-bold mb-4">Thank You for Registering with MIBI ❤️</h1>
    <p class="text-xl text-gray-300 mb-6 max-w-lg mx-auto">Your application has been received successfully.</p>
    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 mb-8 max-w-md mx-auto text-left">
        <h3 class="text-red-400 font-semibold text-sm uppercase tracking-wider mb-3">What Happens Next</h3>
        <ul class="space-y-3 text-sm text-gray-300">
            <li class="flex items-start space-x-2">
                <svg class="w-5 h-5 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span>Our team reviews your application</span>
            </li>
            <li class="flex items-start space-x-2">
                <svg class="w-5 h-5 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span>You receive an approval email with your login credentials</span>
            </li>
            <li class="flex items-start space-x-2">
                <svg class="w-5 h-5 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span>Log in and begin your healing journey</span>
            </li>
        </ul>
    </div>
    <p class="text-gray-400 mb-10 text-lg">We look forward to supporting your journey toward healthier relationships, emotional healing, and personal growth.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="{{ route('home') }}" class="bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 hover:scale-105">Back to Home</a>
      <a href="{{ route('booking.info') }}" class="border-2 border-white/30 hover:border-white text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300">Book a Session</a>
    </div>
  </div>
</section>
@endsection
