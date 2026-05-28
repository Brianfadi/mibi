@extends('layouts.app')

@section('title', 'Testimonials — MIBI Healing Stories')
@section('meta_description', 'Read real healing stories and testimonials from the MIBI community.')

@section('content')
<section class="bg-gradient-to-br from-black via-gray-900 to-red-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Healing Stories</h1>
        <p class="text-xl text-gray-300">Real experiences from our community</p>
    </div>
</section>

@if($featuredTestimonials->isNotEmpty())
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Featured Stories</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredTestimonials as $testimonial)
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                        <span class="text-red-600 font-bold text-lg">{{ substr($testimonial->author_name, 0, 1) }}</span>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold">{{ $testimonial->author_name }}</p>
                        @if($testimonial->author_title)
                        <p class="text-gray-500 text-sm">{{ $testimonial->author_title }}</p>
                        @endif
                    </div>
                </div>
                <p class="text-gray-700 leading-relaxed">"{{ $testimonial->content }}"</p>
                @if($testimonial->rating)
                <div class="mt-4 text-red-500">
                    @for($i = 0; $i < $testimonial->rating; $i++) ★ @endfor
                    @for($i = $testimonial->rating; $i < 5; $i++) ☆ @endfor
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">All Testimonials</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testimonials as $testimonial)
            <div class="bg-white rounded-xl p-6 border border-gray-200">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                        <span class="text-gray-600 font-bold">{{ substr($testimonial->author_name, 0, 1) }}</span>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold text-sm">{{ $testimonial->author_name }}</p>
                        @if($testimonial->service_type)
                        <p class="text-gray-500 text-xs">{{ $testimonial->service_type }}</p>
                        @endif
                    </div>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">"{{ $testimonial->content }}"</p>
                @if($testimonial->rating)
                <div class="mt-3 text-red-500 text-sm">
                    @for($i = 0; $i < $testimonial->rating; $i++) ★ @endfor
                </div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $testimonials->links() }}
        </div>
    </div>
</section>
@endsection
