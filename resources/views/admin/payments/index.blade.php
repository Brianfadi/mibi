@extends('layouts.admin')

@section('title', 'Payments')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Total Revenue</p>
        <p class="text-3xl font-bold mt-1">KES {{ number_format($totalRevenue, 0) }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Monthly Revenue</p>
        <p class="text-3xl font-bold mt-1 text-green-600">KES {{ number_format($monthlyRevenue, 0) }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Pending Amount</p>
        <p class="text-3xl font-bold mt-1 text-yellow-600">KES {{ number_format($pendingAmount, 0) }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Total Transactions</p>
        <p class="text-3xl font-bold mt-1">{{ number_format($totalTransactions, 0) }}</p>
    </div>
</div>

<div class="grid lg:grid-cols-3 gap-6 mb-8">
    <div class="lg:col-span-2 bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <h2 class="text-lg font-semibold mb-4">Monthly Trend</h2>
        <div class="space-y-2">
            @forelse($monthlyTrend as $trend)
            <div class="flex items-center justify-between py-2 border-b border-gray-50 last:border-0">
                <span class="text-sm text-gray-600">{{ $trend->month }}</span>
                <span class="text-sm font-semibold">KES {{ number_format($trend->total, 0) }}</span>
            </div>
            @empty
            <p class="text-gray-500 text-sm">No data yet.</p>
            @endforelse
        </div>
    </div>

    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <h2 class="text-lg font-semibold mb-4">Revenue by Method</h2>
        <div class="space-y-3">
            @forelse($revenueByMethod as $method)
            <div class="flex items-center justify-between py-2 border-b border-gray-50 last:border-0">
                <div>
                    <span class="text-sm capitalize font-medium">{{ $method->payment_method }}</span>
                    <span class="text-xs text-gray-400 ml-2">{{ $method->count }} txns</span>
                </div>
                <span class="text-sm font-semibold">KES {{ number_format($method->total, 0) }}</span>
            </div>
            @empty
            <p class="text-gray-500 text-sm">No data yet.</p>
            @endforelse
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-lg font-semibold">All Payments</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 text-left">
                    <th class="px-6 py-3 font-semibold text-gray-600">ID</th>
                    <th class="px-6 py-3 font-semibold text-gray-600">User</th>
                    <th class="px-6 py-3 font-semibold text-gray-600">Amount</th>
                    <th class="px-6 py-3 font-semibold text-gray-600">Method</th>
                    <th class="px-6 py-3 font-semibold text-gray-600">Status</th>
                    <th class="px-6 py-3 font-semibold text-gray-600">Date</th>
                    <th class="px-6 py-3 font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($payments as $payment)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.payments.show', $payment) }}" class="text-red-600 hover:text-red-700 font-mono">#{{ $payment->id }}</a>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">{{ $payment->user?->name ?? 'N/A' }}</div>
                        <div class="text-xs text-gray-500">{{ $payment->user?->email }}</div>
                    </td>
                    <td class="px-6 py-4 font-medium">KES {{ number_format($payment->amount, 0) }}</td>
                    <td class="px-6 py-4">
                        <span class="capitalize text-xs px-2 py-1 rounded-full
                            @if($payment->payment_method === 'mpesa') bg-green-100 text-green-800
                            @elseif($payment->payment_method === 'stripe') bg-blue-100 text-blue-800
                            @elseif($payment->payment_method === 'paypal') bg-indigo-100 text-indigo-800
                            @elseif($payment->payment_method === 'bank') bg-orange-100 text-orange-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ $payment->payment_method }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-xs px-2 py-1 rounded-full
                            @if($payment->status === 'pending') bg-yellow-100 text-yellow-800
                            @elseif($payment->status === 'completed') bg-green-100 text-green-800
                            @elseif($payment->status === 'failed') bg-red-100 text-red-800
                            @elseif($payment->status === 'refunded') bg-gray-100 text-gray-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($payment->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $payment->created_at->format('M j, Y g:i A') }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-2">
                            @if($payment->status === 'pending')
                            <form action="{{ route('admin.payments.confirm', $payment) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-xs px-3 py-1.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">Confirm</button>
                            </form>
                            @endif
                            @if($payment->status === 'completed')
                            <form action="{{ route('admin.payments.refund', $payment) }}" method="POST" class="inline" onsubmit="return confirm('Refund this payment?')">
                                @csrf
                                <button type="submit" class="text-xs px-3 py-1.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">Refund</button>
                            </form>
                            @endif
                            <a href="{{ route('admin.payments.show', $payment) }}" class="text-xs px-3 py-1.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">View</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">No payments found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-gray-100">
        {{ $payments->links() }}
    </div>
</div>
@endsection
