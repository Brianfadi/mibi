@extends('layouts.admin')

@section('title', 'Bookings')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold">All Bookings</h2>
    <a href="{{ route('admin.bookings.upcoming') }}" class="text-red-600 text-sm hover:text-red-700">View Upcoming</a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left px-6 py-3 font-medium">Client</th>
                <th class="text-left px-6 py-3 font-medium">Service</th>
                <th class="text-left px-6 py-3 font-medium">Date</th>
                <th class="text-left px-6 py-3 font-medium">Status</th>
                <th class="text-left px-6 py-3 font-medium">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($bookings as $booking)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">{{ $booking->user->name }}</td>
                <td class="px-6 py-4">{{ $booking->service?->title ?? 'N/A' }}</td>
                <td class="px-6 py-4">{{ $booking->scheduled_at->format('M j, g:i A') }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-xs
                        @if($booking->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($booking->status === 'confirmed') bg-green-100 text-green-800
                        @elseif($booking->status === 'completed') bg-blue-100 text-blue-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ ucfirst($booking->status) }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.bookings.show', $booking) }}" class="text-red-600 hover:text-red-700">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $bookings->links() }}</div>
@endsection
