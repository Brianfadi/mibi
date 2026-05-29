@extends('layouts.admin')

@section('title', 'Upcoming Bookings')

@section('content')
<div class="w-full space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-2xl p-6 lg:p-8 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center shadow-lg shadow-red-600/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Upcoming Bookings</h2>
                    <p class="text-gray-400 text-sm mt-0.5">Sessions scheduled for the coming days</p>
                </div>
            </div>
            <a href="{{ route('admin.bookings.index') }}" class="inline-flex items-center px-4 py-2.5 bg-white/10 hover:bg-white/20 text-white border border-white/20 rounded-xl text-sm font-medium transition-all backdrop-blur-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                All Bookings
            </a>
        </div>
    </div>

    @if($bookings->isEmpty())
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-16 text-center">
        <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        </div>
        <p class="text-gray-500 font-medium">No upcoming bookings</p>
        <p class="text-gray-400 text-sm mt-1">All set for now!</p>
    </div>
    @else
    <!-- Timeline -->
    <div class="space-y-4">
        @foreach($bookings->groupBy(fn($b) => $b->scheduled_at->format('Y-m-d')) as $date => $dayBookings)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-100 flex items-center space-x-3">
                <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-700 rounded-xl flex items-center justify-center shadow-sm">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-sm font-bold text-gray-900">{{ \Carbon\Carbon::parse($date)->format('l, F j, Y') }}</h3>
                <span class="text-xs text-gray-400 font-medium">{{ $dayBookings->count() }} session{{ $dayBookings->count() !== 1 ? 's' : '' }}</span>
            </div>
            <div class="divide-y divide-gray-100">
                @foreach($dayBookings as $booking)
                <div class="p-5 hover:bg-gray-50 transition-colors">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-start gap-4 flex-1 min-w-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-100 to-red-200 rounded-2xl flex items-center justify-center flex-shrink-0">
                                <span class="text-lg font-bold text-red-700">{{ $booking->scheduled_at->format('h') }}</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1">
                                    <h4 class="font-bold text-gray-900">{{ $booking->user->name }}</h4>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($booking->status === 'pending') bg-yellow-100 text-yellow-700 border border-yellow-200
                                        @elseif($booking->status === 'confirmed') bg-green-100 text-green-700 border border-green-200
                                        @else bg-blue-100 text-blue-700 border border-blue-200 @endif">
                                        <span class="w-1.5 h-1.5 rounded-full mr-1.5
                                            @if($booking->status === 'pending') bg-yellow-500
                                            @elseif($booking->status === 'confirmed') bg-green-500
                                            @else bg-blue-500 @endif">
                                        </span>
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 flex items-center gap-3">
                                    <span class="font-semibold">{{ $booking->scheduled_at->format('g:i A') }}</span>
                                    <span class="text-gray-300">|</span>
                                    <span>{{ $booking->service?->title ?? 'N/A' }}</span>
                                    @if($booking->coach)
                                    <span class="text-gray-300">|</span>
                                    <span>with {{ $booking->coach->name }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('admin.bookings.show', $booking) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-600 hover:text-white bg-red-50 hover:bg-red-600 rounded-lg transition-all flex-shrink-0">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            View
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection