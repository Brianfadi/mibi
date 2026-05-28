@extends('layouts.app')

@section('title', 'Coming Soon — MIBI')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-black via-gray-900 to-red-900 text-white">
    <div class="text-center px-4">
        <div class="text-8xl mb-6">🚀</div>
        <h1 class="text-5xl md:text-6xl font-bold mb-4">Coming Soon</h1>
        <p class="text-xl text-gray-300 mb-8">Something amazing is on its way. Stay tuned!</p>
        <p class="text-gray-400">MIBI — Where Love Faces Reality ❤️</p>
        <a href="{{ route('home') }}" class="mt-8 inline-block bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg font-semibold transition">Back to Home</a>
    </div>
</section>
@endsection
