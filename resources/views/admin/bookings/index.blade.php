@extends('layouts.admin')

@section('title', 'Bookings')

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
                    <h2 class="text-2xl font-bold text-white">Bookings</h2>
                    <p class="text-gray-400 text-sm mt-0.5">Manage all client bookings and sessions</p>
                </div>
            </div>
            <a href="{{ route('admin.bookings.upcoming') }}" class="inline-flex items-center px-4 py-2.5 bg-white/10 hover:bg-white/20 text-white border border-white/20 rounded-xl text-sm font-medium transition-all backdrop-blur-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                Upcoming
            </a>
        </div>
    </div>

    <!-- Stats -->
    @php
        $pendingCount = $bookings->where('status', 'pending')->count();
        $confirmedCount = $bookings->where('status', 'confirmed')->count();
        $completedCount = $bookings->where('status', 'completed')->count();
    @endphp
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-yellow-600">{{ $pendingCount }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Pending</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-green-600">{{ $confirmedCount }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Confirmed</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-blue-600">{{ $completedCount }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Completed</p>
        </div>
    </div>

    <!-- Bookings Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Client</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Service</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Schedule</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Status</th>
                        <th class="text-right px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($bookings as $booking)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-red-100 to-red-200 rounded-xl flex items-center justify-center text-xs font-bold text-red-700 uppercase">
                                    {{ substr($booking->user->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">{{ $booking->user->name }}</p>
                                    @if($booking->coach)
                                    <p class="text-xs text-gray-400">with {{ $booking->coach->name }}</p>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-700 font-medium">{{ $booking->service?->title ?? 'N/A' }}</td>
                        <td class="px-6 py-4">
                            <p class="text-gray-900 font-medium">{{ $booking->scheduled_at->format('M j, Y') }}</p>
                            <p class="text-xs text-gray-400">{{ $booking->scheduled_at->format('g:i A') }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                @if($booking->status === 'pending') bg-yellow-100 text-yellow-700 border border-yellow-200
                                @elseif($booking->status === 'confirmed') bg-green-100 text-green-700 border border-green-200
                                @elseif($booking->status === 'completed') bg-blue-100 text-blue-700 border border-blue-200
                                @else bg-red-100 text-red-700 border border-red-200 @endif">
                                <span class="w-1.5 h-1.5 rounded-full mr-1.5
                                    @if($booking->status === 'pending') bg-yellow-500
                                    @elseif($booking->status === 'confirmed') bg-green-500
                                    @elseif($booking->status === 'completed') bg-blue-500
                                    @else bg-red-500 @endif">
                                </span>
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.bookings.show', $booking) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-600 hover:text-white bg-red-50 hover:bg-red-600 rounded-lg transition-all">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                View
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center">
                            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <p class="text-gray-500 font-medium">No bookings yet</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($bookings->hasPages())
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $bookings->links() }}
        </div>
        @endif
    </div>
</div>
@endsection