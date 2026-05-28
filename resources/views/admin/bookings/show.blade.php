@extends('layouts.admin')

@section('title', 'Booking #' . $booking->id)

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.bookings.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back to Bookings</a>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex justify-between items-start mb-6">
            <h2 class="text-xl font-semibold">Booking #{{ $booking->id }}</h2>
            <span class="px-3 py-1 rounded-full text-sm
                @if($booking->status === 'pending') bg-yellow-100 text-yellow-800
                @elseif($booking->status === 'confirmed') bg-green-100 text-green-800
                @elseif($booking->status === 'completed') bg-blue-100 text-blue-800
                @else bg-red-100 text-red-800 @endif">
                {{ ucfirst($booking->status) }}
            </span>
        </div>

        <dl class="space-y-4">
            <div class="flex justify-between py-2 border-b">
                <dt class="text-gray-600">Client</dt>
                <dd class="font-medium">{{ $booking->user->name }} ({{ $booking->user->email }})</dd>
            </div>
            <div class="flex justify-between py-2 border-b">
                <dt class="text-gray-600">Service</dt>
                <dd>{{ $booking->service?->title ?? 'N/A' }}</dd>
            </div>
            <div class="flex justify-between py-2 border-b">
                <dt class="text-gray-600">Scheduled</dt>
                <dd>{{ $booking->scheduled_at->format('l, F j, Y g:i A') }}</dd>
            </div>
            <div class="flex justify-between py-2 border-b">
                <dt class="text-gray-600">Session Type</dt>
                <dd class="capitalize">{{ str_replace('_', ' ', $booking->session_type) }}</dd>
            </div>
            @if($booking->coach)
            <div class="flex justify-between py-2 border-b">
                <dt class="text-gray-600">Coach</dt>
                <dd>{{ $booking->coach->name }}</dd>
            </div>
            @endif
            @if($booking->meeting_link)
            <div class="flex justify-between py-2 border-b">
                <dt class="text-gray-600">Meeting Link</dt>
                <dd><a href="{{ $booking->meeting_link }}" class="text-red-600" target="_blank">Open →</a></dd>
            </div>
            @endif
            @if($booking->payment)
            <div class="flex justify-between py-2 border-b">
                <dt class="text-gray-600">Payment</dt>
                <dd>{{ strtoupper($booking->payment->payment_method) }} · {{ $booking->payment->status }} · {{ $booking->payment->currency }} {{ number_format($booking->payment->amount, 2) }}</dd>
            </div>
            @endif
        </dl>

        <div class="mt-6 flex gap-3">
            @if($booking->status === 'pending')
            <form action="{{ route('admin.bookings.confirm', $booking) }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700">Confirm</button>
            </form>
            @endif
            @if($booking->status === 'confirmed')
            <form action="{{ route('admin.bookings.complete', $booking) }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">Mark Completed</button>
            </form>
            @endif
            @if(in_array($booking->status, ['pending', 'confirmed']))
            <form action="{{ route('admin.bookings.cancel', $booking) }}" method="POST" onsubmit="return confirm('Cancel this booking?')">
                @csrf
                <input type="hidden" name="reason" value="Cancelled by admin">
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">Cancel Booking</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
