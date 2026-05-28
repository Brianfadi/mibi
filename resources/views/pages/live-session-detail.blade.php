@extends('layouts.app')

@section('title', $session->title . ' — MIBI Live Sessions')
@section('meta_description', Str::limit($session->description, 160))

@section('content')
<section class="bg-gradient-to-br from-black via-gray-900 to-red-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('live-sessions.index') }}" class="text-gray-400 hover:text-white mb-6 inline-block">← Back to Sessions</a>
        <div class="max-w-4xl">
            <span class="text-sm font-semibold uppercase tracking-wider text-red-400">{{ $session->session_type }}</span>
            <h1 class="text-4xl md:text-5xl font-bold mt-2 mb-4">{{ $session->title }}</h1>
            <div class="flex flex-wrap gap-6 text-gray-300">
                <span>{{ $session->session_date->format('l, F j, Y') }}</span>
                <span>{{ $session->start_time_formatted }} @if($session->end_time) - {{ $session->end_time_formatted }} @endif</span>
                @if($session->timezone)
                    <span>{{ $session->timezone }}</span>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="md:col-span-2">
                <div class="prose prose-lg max-w-none">
                    <h2>About This Session</h2>
                    <p>{{ $session->description }}</p>
                </div>
            </div>
            <div>
                <div class="bg-gray-50 rounded-xl p-6 sticky top-24">
                    <h3 class="text-lg font-semibold mb-4">Session Details</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Date</span>
                            <span class="font-medium">{{ $session->session_date->format('M j, Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Time</span>
                            <span class="font-medium">{{ $session->start_time_formatted }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Type</span>
                            <span class="font-medium capitalize">{{ $session->session_type }}</span>
                        </div>
                        @if($session->max_participants)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Spots Left</span>
                            <span class="font-medium">{{ $session->max_participants - $session->registered_count }} / {{ $session->max_participants }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between pt-3 border-t">
                            <span class="text-gray-600">Price</span>
                            <span class="font-bold text-lg {{ $session->is_free ? 'text-green-600' : 'text-red-600' }}">
                                {{ $session->is_free ? 'Free' : $session->formatted_price }}
                            </span>
                        </div>
                    </div>

                    @auth
                    <form action="{{ route('live-sessions.register', $session->slug) }}" method="POST" class="mt-6">
                        @csrf
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition"
                                {{ $session->hasAvailableSpots() ? '' : 'disabled' }}>
                            {{ $session->hasAvailableSpots() ? 'Register Now' : 'Fully Booked' }}
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="mt-6 block w-full bg-red-600 hover:bg-red-700 text-white text-center px-6 py-3 rounded-lg font-semibold transition">
                        Login to Register
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
