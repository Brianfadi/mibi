@extends('layouts.admin')

@section('title', 'Analytics')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Total Visitors</p>
        <p class="text-3xl font-bold mt-1">{{ number_format($totalVisitors) }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Total Registrations</p>
        <p class="text-3xl font-bold mt-1">{{ number_format($totalRegistrations) }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Total Bookings</p>
        <p class="text-3xl font-bold mt-1">{{ number_format($totalBookings) }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Year</p>
        <p class="text-3xl font-bold mt-1">{{ $year }}</p>
    </div>
</div>

<div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 mb-8">
    <h2 class="text-lg font-semibold mb-4">Conversion Funnel</h2>
    <div class="flex items-center justify-center space-x-4 md:space-x-8">
        <div class="text-center">
            <p class="text-3xl font-bold text-blue-600">{{ number_format($totalVisitors) }}</p>
            <p class="text-sm text-gray-500">Visitors</p>
        </div>
        <div class="text-gray-300">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
        </div>
        <div class="text-center">
            <p class="text-3xl font-bold text-green-600">{{ number_format($totalRegistrations) }}</p>
            <p class="text-sm text-gray-500">Registrations</p>
        </div>
        <div class="text-gray-300">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
        </div>
        <div class="text-center">
            <p class="text-3xl font-bold text-red-600">{{ number_format($totalBookings) }}</p>
            <p class="text-sm text-gray-500">Bookings</p>
        </div>
    </div>
</div>

<div class="grid md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <h2 class="text-lg font-semibold mb-4">Monthly Revenue (KES)</h2>
        <canvas id="revenueChart" height="150"></canvas>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <h2 class="text-lg font-semibold mb-4">User Growth</h2>
        <canvas id="userChart" height="150"></canvas>
    </div>
</div>

<div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 mb-8">
    <h2 class="text-lg font-semibold mb-4">Bookings Per Month</h2>
    <canvas id="bookingsChart" height="100"></canvas>
</div>

<div class="grid md:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <h2 class="text-lg font-semibold mb-4">Top Services</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-gray-500 border-b border-gray-100">
                        <th class="pb-3 font-medium">Service Name</th>
                        <th class="pb-3 font-medium text-right">Booking Count</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($topServices as $service)
                    <tr class="border-b border-gray-50">
                        <td class="py-3">{{ $service->service?->title ?? $service->service_id }}</td>
                        <td class="py-3 text-right font-semibold">{{ $service->total }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="py-4 text-gray-500 text-center">No service data available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <h2 class="text-lg font-semibold mb-4">Payment Methods</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-gray-500 border-b border-gray-100">
                        <th class="pb-3 font-medium">Method</th>
                        <th class="pb-3 font-medium text-right">Total KES</th>
                        <th class="pb-3 font-medium text-right">Count</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($paymentMethods as $method)
                    <tr class="border-b border-gray-50">
                        <td class="py-3 capitalize">{{ $method->payment_method }}</td>
                        <td class="py-3 text-right font-semibold">KES {{ number_format($method->total, 0) }}</td>
                        <td class="py-3 text-right">{{ $method->count }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="py-4 text-gray-500 text-center">No payment data available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
(function() {
    const months = @json($monthlyRevenue->keys());
    const revenueData = @json($monthlyRevenue->values());
    const userData = @json($monthlyUsers->values());
    const bookingsData = @json($monthlyBookings->values());

    new Chart(document.getElementById('revenueChart'), {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Revenue (KES)',
                data: revenueData,
                backgroundColor: 'rgba(220, 38, 38, 0.7)',
                borderColor: 'rgba(220, 38, 38, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, ticks: { callback: v => 'KES ' + v.toLocaleString() } }
            }
        }
    });

    new Chart(document.getElementById('userChart'), {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'New Users',
                data: userData,
                borderColor: '#16a34a',
                backgroundColor: 'rgba(22, 163, 74, 0.1)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    new Chart(document.getElementById('bookingsChart'), {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Bookings',
                data: bookingsData,
                backgroundColor: 'rgba(59, 130, 246, 0.7)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, ticks: { precision: 0 } }
            }
        }
    });
})();
</script>
@endpush
