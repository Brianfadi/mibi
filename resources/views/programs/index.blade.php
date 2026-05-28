@extends('layouts.app')

@section('title', 'Coaching Programs — MIBI')
@section('meta_description', 'Explore MIBI coaching programs and healing plans designed to support your emotional wellness journey.')

@section('content')
<section class="bg-gradient-to-br from-black via-gray-900 to-red-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Coaching Programs</h1>
        <p class="text-xl text-gray-300">Structured healing journeys for lasting transformation</p>
    </div>
</section>

@if($featuredProgram)
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-red-600 to-red-800 rounded-2xl p-8 md:p-12 text-white">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="text-sm font-semibold uppercase tracking-wider">Featured Program</span>
                    <h2 class="text-3xl font-bold mt-2 mb-4">{{ $featuredProgram->title }}</h2>
                    <p class="text-red-100 mb-6">{{ $featuredProgram->short_description }}</p>
                    <div class="flex items-center gap-4 mb-6">
                        <span class="text-3xl font-bold">{{ $featuredProgram->formatted_price }}</span>
                        @if($featuredProgram->duration_label)
                            <span class="text-red-200">/ {{ $featuredProgram->duration_label }}</span>
                        @endif
                    </div>
                    <a href="{{ route('programs.show', $featuredProgram->slug) }}" class="inline-block bg-white text-red-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">View Program</a>
                </div>
                <div class="hidden md:block text-right">
                    <div class="text-8xl opacity-50">⭐</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">All Programs</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @forelse($programs as $program)
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">{{ $program->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ $program->short_description }}</p>
                    @if($program->features)
                    <ul class="space-y-2 mb-6">
                        @foreach($program->features as $feature)
                        <li class="flex items-start text-sm text-gray-600">
                            <svg class="w-4 h-4 text-green-500 mt-0.5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div>
                            <span class="text-2xl font-bold text-red-600">{{ $program->formatted_price }}</span>
                            @if($program->duration_label)
                                <span class="text-sm text-gray-500">/ {{ $program->duration_label }}</span>
                            @endif
                        </div>
                        <a href="{{ route('programs.show', $program->slug) }}" class="text-red-600 hover:text-red-700 font-semibold text-sm">Learn More →</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-500">Programs coming soon.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@if($faqs->isNotEmpty())
<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
        <div class="space-y-4">
            @foreach($faqs as $faq)
            <details class="border border-gray-200 rounded-lg p-4">
                <summary class="font-semibold cursor-pointer">{{ $faq->question }}</summary>
                <p class="mt-4 text-gray-600">{{ $faq->answer }}</p>
            </details>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="py-16 bg-black text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4">Start Your Healing Journey</h2>
        <p class="text-gray-400 mb-8">Transform your relationships and emotional wellness with our structured programs.</p>
        <a href="{{ route('register') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-lg font-semibold text-lg transition">Start Healing Journey</a>
    </div>
</section>
@endsection
