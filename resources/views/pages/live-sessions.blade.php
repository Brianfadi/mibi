@extends('layouts.app')

@section('title', 'Live Sessions — MIBI')
@section('meta_description', 'Join MIBI live sessions, workshops, and community discussions on relationships and emotional wellness.')

@section('content')
<section class="bg-gradient-to-br from-black via-gray-900 to-red-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Live Sessions</h1>
        <p class="text-xl text-gray-300">Join our community discussions, workshops, and healing sessions</p>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($upcomingSessions->isEmpty())
        <div class="text-center py-12">
            <div class="text-6xl mb-4">🎥</div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">No Upcoming Sessions</h2>
            <p class="text-gray-600">Check back soon for new live sessions and workshops.</p>
        </div>
        @else
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Upcoming Sessions</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
            @foreach($upcomingSessions as $session)
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition">
                <div class="bg-gradient-to-r from-red-600 to-red-800 text-white p-6">
                    <p class="text-sm font-semibold mb-1">{{ $session->session_date->format('l, F j, Y') }}</p>
                    <p class="text-2xl font-bold">{{ date('g:i A', strtotime($session->start_time)) }}</p>
                </div>
                <div class="p-6">
                    <span class="text-xs text-red-600 font-semibold uppercase">{{ $session->session_type }}</span>
                    <h3 class="text-lg font-semibold mt-1 mb-2">{{ $session->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($session->description, 100) }}</p>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-500">{{ $session->registered_count }}/{{ $session->max_participants ?? '∞' }} registered</span>
                        @if($session->is_free)
                            <span class="text-green-600 font-semibold">Free</span>
                        @else
                            <span class="text-red-600 font-semibold">KES {{ number_format($session->price, 0) }}</span>
                        @endif
                    </div>
                    @auth
                    <form action="{{ route('live-sessions.register', $session->slug) }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg text-sm font-semibold transition"
                                @if(!$session->hasAvailableSpots()) disabled @endif>
                            {{ $session->hasAvailableSpots() ? 'Register Now' : 'Fully Booked' }}
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="mt-4 block w-full bg-gray-100 hover:bg-gray-200 text-gray-700 text-center py-2 rounded-lg text-sm font-semibold transition">
                        Login to Register
                    </a>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
        @endif

        @if($pastSessions->isNotEmpty())
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Past Sessions</h2>
        <div class="space-y-4">
            @foreach($pastSessions as $session)
            <div class="bg-gray-50 rounded-xl p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="font-semibold">{{ $session->title }}</h3>
                        <p class="text-sm text-gray-500">{{ $session->session_date->format('F j, Y') }} · {{ date('g:i A', strtotime($session->start_time)) }}</p>
                    </div>
                    <span class="text-sm text-gray-400">{{ $session->registered_count }} attended</span>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection
