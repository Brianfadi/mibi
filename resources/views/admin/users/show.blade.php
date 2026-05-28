@extends('layouts.admin')

@section('title', 'User Details')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back to Users</a>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="flex items-start justify-between">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                    <span class="text-2xl font-bold text-red-600">{{ substr($user->name, 0, 1) }}</span>
                </div>
                <div>
                    <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                    <p class="text-gray-600">{{ $user->email }}</p>
                    @if($user->phone)<p class="text-gray-500 text-sm">{{ $user->phone }}</p>@endif
                </div>
            </div>
            <div class="text-right">
                @foreach($user->roles as $role)
                    <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-800 ml-1">{{ $role->name }}</span>
                @endforeach
                <br>
                <span class="text-xs {{ $user->is_active ? 'text-green-600' : 'text-red-600' }}">{{ $user->is_active ? 'Active' : 'Inactive' }}</span>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('admin.users.edit', $user) }}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">Edit User</a>
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-semibold mb-4">Recent Bookings ({{ $user->bookings->count() }})</h3>
            @forelse($user->bookings->take(5) as $booking)
            <div class="py-2 border-b border-gray-50 last:border-0">
                <p class="text-sm font-medium">{{ $booking->service?->title ?? 'N/A' }}</p>
                <p class="text-xs text-gray-500">{{ $booking->scheduled_at->format('M j, Y g:i A') }} · {{ $booking->status }}</p>
            </div>
            @empty
            <p class="text-sm text-gray-500">No bookings yet.</p>
            @endforelse
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-semibold mb-4">Payments ({{ $user->payments->count() }})</h3>
            @forelse($user->payments->take(5) as $payment)
            <div class="py-2 border-b border-gray-50 last:border-0">
                <p class="text-sm">{{ $payment->currency }} {{ number_format($payment->amount, 2) }}</p>
                <p class="text-xs text-gray-500">{{ $payment->payment_method }} · {{ $payment->status }} · {{ $payment->created_at->format('M j, Y') }}</p>
            </div>
            @empty
            <p class="text-sm text-gray-500">No payments yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
