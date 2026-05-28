@extends('layouts.app')

@section('title', 'My Bookings — MIBI')

@section('content')
<section class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">My Bookings</h1>
            <a href="{{ route('bookings.create') }}" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition">Book New Session</a>
        </div>

        @if($upcomingBookings->isNotEmpty())
        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Upcoming Sessions</h2>
            <div class="space-y-4">
                @foreach($upcomingBookings as $booking)
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-semibold text-lg">{{ $booking->service?->title ?? 'General Session' }}</h3>
                            <p class="text-gray-600">{{ $booking->scheduled_at->format('l, F j, Y \a\t g:i A') }}</p>
                            <p class="text-sm text-gray-500 capitalize">{{ str_replace('_', ' ', $booking->session_type) }} · {{ $booking->timezone }}</p>
                            @if($booking->meeting_link)
                            <a href="{{ $booking->meeting_link }}" class="text-sm text-red-600 hover:text-red-700 mt-1 inline-block">Join Meeting →</a>
                            @endif
                        </div>
                        <div class="text-right">
                            <span class="text-xs px-3 py-1 rounded-full
                                @if($booking->status === 'pending') bg-yellow-100 text-yellow-800
                                @else bg-green-100 text-green-800 @endif">
                                {{ ucfirst($booking->status) }}
                            </span>
                            @if($booking->canCancel())
                            <form action="{{ route('bookings.cancel', $booking) }}" method="POST" class="mt-2">
                                @csrf
                                <button type="submit" onclick="return confirm('Cancel this booking?')" class="text-xs text-red-600 hover:text-red-700">Cancel</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @if($pastBookings->isNotEmpty())
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Past Sessions</h2>
            <div class="space-y-4">
                @foreach($pastBookings as $booking)
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-semibold">{{ $booking->service?->title ?? 'General Session' }}</h3>
                            <p class="text-gray-600 text-sm">{{ $booking->scheduled_at->format('M j, Y g:i A') }}</p>
                        </div>
                        <span class="text-xs px-3 py-1 rounded-full
                            @if($booking->status === 'completed') bg-blue-100 text-blue-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @if($upcomingBookings->isEmpty() && $pastBookings->isEmpty())
        <div class="text-center py-12">
            <div class="text-6xl mb-4">📅</div>
            <h2 class="text-xl font-semibold text-gray-900 mb-2">No Bookings Yet</h2>
            <p class="text-gray-600 mb-6">Start your healing journey by booking a session.</p>
            <a href="{{ route('bookings.create') }}" class="bg-red-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-red-700 transition">Book Your First Session</a>
        </div>
        @endif
    </div>
</section>
@endsection
