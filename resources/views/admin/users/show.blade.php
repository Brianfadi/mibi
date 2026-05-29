@extends('layouts.admin')

@section('title', 'User Details')

@section('content')
<div class="w-full space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-2xl p-6 lg:p-8 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="relative flex items-center space-x-4">
            <a href="{{ route('admin.users.index') }}" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center text-white border border-white/20 transition-all backdrop-blur-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <h2 class="text-2xl font-bold text-white">User Details</h2>
                <p class="text-gray-400 text-sm mt-0.5">{{ $user->name }}</p>
            </div>
        </div>
    </div>

    <!-- Profile Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8">
        <div class="flex flex-col sm:flex-row items-start gap-6">
            <div class="w-20 h-20 bg-gradient-to-br from-red-100 to-red-200 rounded-2xl flex items-center justify-center flex-shrink-0">
                <span class="text-3xl font-bold text-red-700">{{ substr($user->name, 0, 1) }}</span>
            </div>
            <div class="flex-1">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">{{ $user->name }}</h3>
                        <p class="text-gray-500 mt-0.5">{{ $user->email }}</p>
                        @if($user->phone)
                        <p class="text-gray-400 text-sm mt-0.5">{{ $user->phone }}</p>
                        @endif
                    </div>
                    <div class="flex items-center gap-2">
                        @foreach($user->roles as $role)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                            @if($role->name === 'admin') bg-red-100 text-red-700 border border-red-200
                            @elseif($role->name === 'coach') bg-blue-100 text-blue-700 border border-blue-200
                            @else bg-gray-100 text-gray-700 border border-gray-200 @endif">
                            {{ ucfirst($role->name) }}
                        </span>
                        @endforeach
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                            @if($user->is_active) bg-green-100 text-green-700 border border-green-200
                            @else bg-red-100 text-red-700 border border-red-200 @endif">
                            <span class="w-1.5 h-1.5 rounded-full mr-1.5 @if($user->is_active) bg-green-500 @else bg-red-500 @endif"></span>
                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 pt-6 border-t border-gray-100">
            <a href="{{ route('admin.users.edit', $user) }}" class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white rounded-xl text-sm font-medium transition-all shadow-lg shadow-red-600/30">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Edit User
            </a>
        </div>
    </div>

    <!-- Recent Bookings & Payments -->
    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Recent Bookings ({{ $user->bookings->count() }})
            </h3>
            <div class="space-y-3">
                @forelse($user->bookings->take(5) as $booking)
                <div class="flex items-center justify-between py-2 border-b border-gray-50 last:border-0">
                    <div>
                        <p class="text-sm font-medium text-gray-900">{{ $booking->service?->title ?? 'N/A' }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $booking->scheduled_at->format('M j, Y g:i A') }}</p>
                    </div>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                        @if($booking->status === 'pending') bg-yellow-100 text-yellow-700
                        @elseif($booking->status === 'confirmed') bg-green-100 text-green-700
                        @else bg-blue-100 text-blue-700 @endif">
                        {{ ucfirst($booking->status) }}
                    </span>
                </div>
                @empty
                <p class="text-sm text-gray-400">No bookings yet.</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                Payments ({{ $user->payments->count() }})
            </h3>
            <div class="space-y-3">
                @forelse($user->payments->take(5) as $payment)
                <div class="flex items-center justify-between py-2 border-b border-gray-50 last:border-0">
                    <div>
                        <p class="text-sm font-semibold text-gray-900">{{ $payment->currency }} {{ number_format($payment->amount, 2) }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $payment->payment_method }} · {{ $payment->created_at->format('M j, Y') }}</p>
                    </div>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                        @if($payment->status === 'completed') bg-green-100 text-green-700
                        @elseif($payment->status === 'pending') bg-yellow-100 text-yellow-700
                        @else bg-red-100 text-red-700 @endif">
                        {{ ucfirst($payment->status) }}
                    </span>
                </div>
                @empty
                <p class="text-sm text-gray-400">No payments yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection