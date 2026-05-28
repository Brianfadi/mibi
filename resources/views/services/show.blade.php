@extends('layouts.app')

@section('title', $service->title . ' — MIBI Services')
@section('meta_description', $service->short_description)

@section('content')
<section class="bg-gradient-to-br from-black via-gray-900 to-red-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('services.index') }}" class="inline-flex items-center text-gray-400 hover:text-white mb-6 transition">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Services
        </a>
        <div class="max-w-4xl">
            <div class="flex items-center mb-4">
                <span class="text-4xl mr-4">{{ $service->icon ?? '❤️' }}</span>
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold">{{ $service->title }}</h1>
                    <p class="text-gray-300 mt-2">{{ $service->short_description }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="md:col-span-2">
                <div class="prose prose-gray max-w-none">
                    <h2>About This Service</h2>
                    <p>{{ $service->description }}</p>
                </div>

                @if($service->highlights)
                <div class="mt-8">
                    <h3 class="text-xl font-semibold mb-4">What You'll Get</h3>
                    <ul class="space-y-3">
                        @foreach($service->highlights as $highlight)
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span class="text-gray-700">{{ $highlight }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div>
                <div class="bg-gray-50 rounded-xl p-6 sticky top-24">
                    <h3 class="text-lg font-semibold mb-4">Session Details</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Price</span>
                            <span class="font-semibold text-lg text-red-600">{{ $service->formatted_price }}</span>
                        </div>
                        @if($service->duration_minutes)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Duration</span>
                            <span class="font-semibold">{{ $service->duration_label }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between">
                            <span class="text-gray-600">Session Type</span>
                            <span class="font-semibold capitalize">{{ $service->session_type }}</span>
                        </div>
                    </div>
                    <a href="{{ route('bookings.create') }}?service={{ $service->slug }}" class="mt-6 block w-full bg-red-600 hover:bg-red-700 text-white text-center px-6 py-3 rounded-lg font-semibold transition">
                        Book This Service
                    </a>
                    <p class="text-xs text-gray-500 text-center mt-3">100% confidential. Secure payment.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@if($relatedServices->isNotEmpty())
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Services</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($relatedServices as $related)
            <a href="{{ route('services.show', $related->slug) }}" class="bg-white rounded-xl p-6 border border-gray-200 hover:shadow-md transition group">
                <h3 class="font-semibold group-hover:text-red-600 transition">{{ $related->title }}</h3>
                <p class="text-sm text-gray-600 mt-2">{{ $related->short_description }}</p>
                <p class="text-red-600 font-semibold mt-4">{{ $related->formatted_price }}</p>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
