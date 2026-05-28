@extends('layouts.admin')

@section('title', 'Coach Profile')

@section('content')
<div class="max-w-5xl">
    <a href="{{ route('admin.coaches.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back to Coaches</a>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="flex items-start gap-5">
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-2xl font-bold text-red-600">{{ substr($coach->name, 0, 1) }}</span>
            </div>
            <div class="flex-1 min-w-0">
                <h2 class="text-xl font-semibold">{{ $coach->name }}</h2>
                <p class="text-gray-600">{{ $coach->email }}</p>
                @if($coach->phone)<p class="text-gray-500 text-sm">{{ $coach->phone }}</p>@endif
                @if($coach->bio)<p class="text-gray-600 text-sm mt-2">{{ $coach->bio }}</p>@endif
            </div>
            <a href="{{ route('admin.coaches.edit', $coach) }}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700 flex-shrink-0">Edit</a>
        </div>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 text-center">
            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_sessions'] ?? 0 }}</p>
            <p class="text-sm text-gray-500">Total Sessions</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 text-center">
            <p class="text-2xl font-bold text-green-600">{{ $stats['completed_sessions'] ?? 0 }}</p>
            <p class="text-sm text-gray-500">Completed</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 text-center">
            <p class="text-2xl font-bold text-blue-600">{{ $stats['upcoming_sessions'] ?? 0 }}</p>
            <p class="text-sm text-gray-500">Upcoming</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 text-center">
            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_clients'] ?? 0 }}</p>
            <p class="text-sm text-gray-500">Clients</p>
        </div>
    </div>

    @if(isset($stats['rating']))
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 text-center mb-6 max-w-xs">
        <p class="text-2xl font-bold text-yellow-500">{{ number_format($stats['rating'], 1) }}</p>
        <p class="text-sm text-gray-500">Rating</p>
    </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h3 class="font-semibold">Recent Bookings</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600">
                    <tr>
                        <th class="text-left px-6 py-3 font-medium">Client</th>
                        <th class="text-left px-6 py-3 font-medium">Service</th>
                        <th class="text-left px-6 py-3 font-medium">Date</th>
                        <th class="text-left px-6 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($coach->bookings as $booking)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $booking->user?->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $booking->service?->title ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $booking->scheduled_at ? $booking->scheduled_at->format('M j, Y g:i A') : '—' }}</td>
                        <td class="px-6 py-4">
                            <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-800">{{ $booking->status }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">No bookings yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection