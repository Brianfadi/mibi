@extends('layouts.admin')

@section('title', 'Payment Detail')

@section('breadcrumb')
    <span class="mx-2">/</span>
    <a href="{{ route('admin.payments.index') }}" class="hover:text-gray-600">Payments</a>
    <span class="mx-2">/</span>
    <span class="text-gray-600">#{{ $payment->id }}</span>
@endsection

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
            <h2 class="text-lg font-semibold">Payment #{{ $payment->id }}</h2>
            <span class="text-xs px-3 py-1.5 rounded-full font-medium
                @if($payment->status === 'pending') bg-yellow-100 text-yellow-800
                @elseif($payment->status === 'completed') bg-green-100 text-green-800
                @elseif($payment->status === 'failed') bg-red-100 text-red-800
                @elseif($payment->status === 'refunded') bg-gray-100 text-gray-800
                @else bg-gray-100 text-gray-800 @endif">
                {{ ucfirst($payment->status) }}
            </span>
        </div>
        <div class="p-6 space-y-5">
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wider">Payment ID</p>
                    <p class="font-mono text-sm mt-1">#{{ $payment->id }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wider">Amount</p>
                    <p class="text-2xl font-bold mt-1">KES {{ number_format($payment->amount, 0) }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wider">User</p>
                    <p class="font-medium mt-1">{{ $payment->user?->name ?? 'N/A' }}</p>
                    <p class="text-xs text-gray-500">{{ $payment->user?->email }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wider">Payment Method</p>
                    <p class="capitalize font-medium mt-1">{{ $payment->payment_method ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wider">Transaction Reference</p>
                    <p class="font-mono text-sm mt-1">{{ $payment->transaction_reference ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wider">Paid At</p>
                    <p class="font-medium mt-1">{{ $payment->paid_at ? $payment->paid_at->format('M j, Y g:i A') : 'N/A' }}</p>
                </div>
            </div>

            <hr class="border-gray-100">

            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wider mb-2">Payable</p>
                <p class="font-medium">{{ $payment->payable?->name ?? get_class($payment->payable ?? 'N/A') }}</p>
            </div>

            @if($payment->booking)
            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wider mb-2">Booking</p>
                <a href="{{ route('admin.bookings.show', $payment->booking) }}" class="text-red-600 hover:text-red-700 font-medium">
                    Booking #{{ $payment->booking->id }}
                </a>
                <p class="text-sm text-gray-500 mt-0.5">{{ $payment->booking->service?->title ?? 'N/A' }} · {{ $payment->booking->scheduled_at?->format('M j, Y') }}</p>
            </div>
            @endif
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center space-x-3">
            @if($payment->status === 'pending')
            <form action="{{ route('admin.payments.confirm', $payment) }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition-colors">Confirm Payment</button>
            </form>
            @endif
            @if($payment->status === 'completed')
            <form action="{{ route('admin.payments.refund', $payment) }}" method="POST" onsubmit="return confirm('Are you sure you want to refund this payment?')">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors">Refund Payment</button>
            </form>
            @endif
            <a href="{{ route('admin.payments.index') }}" class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Back</a>
        </div>
    </div>
</div>
@endsection
