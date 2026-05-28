@extends('layouts.app')

@section('title', 'Booking #' . $booking->id . ' — MIBI')

@section('content')
<section class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('bookings.index') }}" class="inline-flex items-center text-gray-600 hover:text-red-600 mb-6 transition">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to My Bookings
        </a>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Booking #{{ $booking->id }}</h1>
                    <p class="text-gray-600 mt-1">{{ $booking->service?->title ?? 'General Session' }}</p>
                </div>
                <span class="text-sm px-4 py-2 rounded-full
                    @if($booking->status === 'pending') bg-yellow-100 text-yellow-800
                    @elseif($booking->status === 'confirmed') bg-green-100 text-green-800
                    @elseif($booking->status === 'completed') bg-blue-100 text-blue-800
                    @else bg-gray-100 text-gray-800 @endif">
                    {{ ucfirst($booking->status) }}
                </span>
            </div>

            <div class="space-y-4">
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600">Date & Time</span>
                    <span class="font-medium">{{ $booking->scheduled_at->format('l, F j, Y g:i A') }}</span>
                </div>
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600">Session Type</span>
                    <span class="font-medium capitalize">{{ str_replace('_', ' ', $booking->session_type) }}</span>
                </div>
                @if($booking->coach)
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600">Coach</span>
                    <span class="font-medium">{{ $booking->coach->name }}</span>
                </div>
                @endif
                @if($booking->meeting_link)
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600">Meeting Link</span>
                    <a href="{{ $booking->meeting_link }}" class="font-medium text-red-600 hover:text-red-700">Join →</a>
                </div>
                @endif
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600">Price</span>
                    <span class="font-medium">{{ $booking->service?->formatted_price ?? '—' }}</span>
                </div>
                @if($booking->payment)
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600">Payment</span>
                    <span class="font-medium capitalize">{{ $booking->payment->payment_method }} · {{ $booking->payment->status }}</span>
                </div>
                @endif
                @if($booking->notes)
                <div class="py-3">
                    <span class="text-gray-600 block mb-1">Notes</span>
                    <p class="text-gray-800">{{ $booking->notes }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
