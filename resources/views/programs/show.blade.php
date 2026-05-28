@extends('layouts.app')

@section('title', $program->title . ' — MIBI Programs')
@section('meta_description', $program->short_description)

@section('content')
<section class="bg-gradient-to-br from-black via-gray-900 to-red-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('programs.index') }}" class="text-gray-400 hover:text-white mb-6 inline-block">← Back to Programs</a>
        <div class="max-w-4xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $program->title }}</h1>
            <p class="text-xl text-gray-300">{{ $program->short_description }}</p>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="md:col-span-2">
                <div class="prose prose-lg max-w-none">
                    <h2>About This Program</h2>
                    <p>{{ $program->description }}</p>
                </div>

                @if($program->features)
                <div class="mt-8">
                    <h3 class="text-xl font-semibold mb-4">What's Included</h3>
                    <ul class="space-y-3">
                        @foreach($program->features as $feature)
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span class="text-gray-700">{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if($program->prerequisites)
                <div class="mt-8">
                    <h3 class="text-xl font-semibold mb-4">Prerequisites</h3>
                    <ul class="space-y-2">
                        @foreach($program->prerequisites as $prerequisite)
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span class="text-gray-700">{{ $prerequisite }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div>
                <div class="bg-gray-50 rounded-xl p-6 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $program->formatted_price }}</h3>
                    @if($program->duration_label)
                        <p class="text-gray-500 text-sm mb-4">{{ $program->duration_label }}</p>
                    @endif

                    <div class="space-y-2 text-sm mb-6">
                        @if($program->max_participants)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Max Participants</span>
                            <span class="font-medium">{{ $program->max_participants }}</span>
                        </div>
                        @endif
                    </div>

                    <a href="{{ route('register') }}" class="block w-full bg-red-600 hover:bg-red-700 text-white text-center px-6 py-3 rounded-lg font-semibold transition">
                        Enroll Now
                    </a>
                    <p class="text-xs text-gray-500 text-center mt-3">Start your transformation today</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
