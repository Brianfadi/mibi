@extends('layouts.app')

@section('title', 'Our Services — MIBI')
@section('meta_description', 'Explore MIBI coaching services: relationship coaching, emotional support, breakup recovery, and personal growth sessions.')

@section('content')
<section class="bg-gradient-to-br from-black via-gray-900 to-red-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Services</h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto">Professional support tailored to your relationship and emotional wellness journey</p>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @foreach($services as $type => $typeServices)
            <div class="mb-16">
                <h2 class="text-2xl font-bold text-gray-900 mb-2 capitalize">{{ $type }} Sessions</h2>
                <p class="text-gray-600 mb-8">
                    @switch($type)
                        @case('individual') One-on-one coaching sessions tailored to your unique needs. @break
                        @case('couples') Guided sessions for partners seeking deeper connection and understanding. @break
                        @case('group') Join group discussions and workshops in a supportive community setting. @break
                    @endswitch
                </p>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($typeServices as $service)
                        <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition group">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                                <span class="text-2xl">{{ $service->icon ?? '❤️' }}</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-2 group-hover:text-red-600 transition">{{ $service->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ $service->short_description }}</p>

                            @if($service->highlights)
                            <ul class="space-y-2 mb-4">
                                @foreach($service->highlights as $highlight)
                                <li class="flex items-start text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-red-500 mt-0.5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    {{ $highlight }}
                                </li>
                                @endforeach
                            </ul>
                            @endif

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div>
                                    <span class="text-lg font-bold text-red-600">{{ $service->formatted_price }}</span>
                                    @if($service->duration_minutes)
                                        <span class="text-sm text-gray-500 ml-2">/ {{ $service->duration_label }}</span>
                                    @endif
                                </div>
                                <a href="{{ route('services.show', $service->slug) }}" class="text-sm text-red-600 hover:text-red-700 font-semibold">Details →</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- CTA -->
<section class="py-16 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Ready to Start Your Healing Journey?</h2>
        <p class="text-gray-600 mb-8">Book a session today and take the first step toward healthier relationships and emotional wellness.</p>
        <a href="{{ route('bookings.create') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-lg font-semibold text-lg transition">Book Your Session</a>
    </div>
</section>

<!-- FAQs -->
@if($faqs->isNotEmpty())
<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
        <div class="space-y-4">
            @foreach($faqs as $faq)
            <details class="border border-gray-200 rounded-lg p-4 group">
                <summary class="font-semibold text-gray-900 cursor-pointer flex justify-between items-center">
                    {{ $faq->question }}
                    <svg class="w-5 h-5 text-gray-500 group-open:rotate-180 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </summary>
                <p class="mt-4 text-gray-600 leading-relaxed">{{ $faq->answer }}</p>
            </details>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
