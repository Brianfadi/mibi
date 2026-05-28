@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-sm p-4 flex items-center justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
            <p class="text-sm text-gray-500">Common admin tasks for fast access</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700">Users</a>
            <a href="{{ route('admin.services.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-800 rounded-lg shadow hover:bg-gray-200">Add Service</a>
            <a href="{{ route('admin.blog.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-800 rounded-lg shadow hover:bg-gray-200">New Post</a>
            <a href="{{ route('admin.bookings.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-800 rounded-lg shadow hover:bg-gray-200">Bookings</a>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
        <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Users</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['total_users']) }}</p>
                </div>
                <div class="p-3 bg-blue-100 rounded-full">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>
            <div class="mt-2 flex items-center text-sm">
                <span class="text-green-600 font-medium">{{ $stats['new_users_today'] }}</span>
                <span class="text-gray-400 ml-1">new today</span>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Active Users</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['active_users']) }}</p>
                </div>
                <div class="p-3 bg-green-100 rounded-full">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z"/></svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Pending Bookings</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['pending_bookings']) }}</p>
                </div>
                <div class="p-3 bg-yellow-100 rounded-full">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Monthly Revenue</p>
                    <p class="text-2xl font-bold text-gray-900">KES {{ number_format($stats['monthly_revenue']) }}</p>
                </div>
                <div class="p-3 bg-purple-100 rounded-full">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Unread Messages</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['unread_messages']) }}</p>
                </div>
                <div class="p-3 bg-red-100 rounded-full">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-indigo-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Subscribers</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['total_subscribers']) }}</p>
                </div>
                <div class="p-3 bg-indigo-100 rounded-full">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div class="mt-2 flex items-center text-sm">
                <span class="text-green-600 font-medium">+{{ $stats['new_subscribers_month'] }}</span>
                <span class="text-gray-400 ml-1">this month</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl shadow-sm p-4 flex items-center space-x-3">
            <div class="p-2 bg-orange-100 rounded-lg">
                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-xs text-gray-500">Pending Registrations</p>
                <p class="text-lg font-semibold text-gray-900">{{ number_format($stats['pending_registrations']) }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-4 flex items-center space-x-3">
            <div class="p-2 bg-teal-100 rounded-lg">
                <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            </div>
            <div>
                <p class="text-xs text-gray-500">Open Tickets</p>
                <p class="text-lg font-semibold text-gray-900">{{ number_format($stats['open_tickets']) }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-4 flex items-center space-x-3">
            <div class="p-2 bg-pink-100 rounded-lg">
                <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </div>
            <div>
                <p class="text-xs text-gray-500">Active Coaches</p>
                <p class="text-lg font-semibold text-gray-900">{{ number_format($stats['active_coaches']) }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-4 flex items-center space-x-3">
            <div class="p-2 bg-cyan-100 rounded-lg">
                <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div>
                <p class="text-xs text-gray-500">Total Clients</p>
                <p class="text-lg font-semibold text-gray-900">{{ number_format($stats['total_clients']) }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Monthly Revenue</h3>
                <canvas id="revenueChart" height="100"></canvas>
            </div>
        </div>
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Signups</h3>
                <ul class="space-y-3">
                    @forelse($recentUsers as $user)
                    <li class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-red-500 to-red-700 text-white flex items-center justify-center font-semibold">{{ strtoupper(substr($user->name,0,1)) }}</div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                                <p class="text-xs text-gray-400">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="text-xs text-gray-500">{{ $user->created_at->diffForHumans() }}</div>
                    </li>
                    @empty
                    <li class="text-sm text-gray-500">No recent signups</li>
                    @endforelse
                </ul>
                <div class="mt-4 text-center">
                    <a href="{{ route('admin.users.index') }}" class="text-sm text-red-600 hover:underline">View all users</a>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Bookings by Status</h3>
            <canvas id="bookingChart" height="100"></canvas>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">User Growth</h3>
            <canvas id="userGrowthChart" height="100"></canvas>
        </div>
    </div>

    

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <div class="xl:col-span-1 bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Bookings</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Client</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Service</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Coach</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($recentBookings->take(5) as $booking)
                        <tr class="hover:bg-gray-50">
                            <td class="px-3 py-2 text-sm text-gray-900">{{ $booking->user->name ?? 'N/A' }}</td>
                            <td class="px-3 py-2 text-sm text-gray-600">{{ $booking->service->name ?? 'N/A' }}</td>
                            <td class="px-3 py-2 text-sm text-gray-600">{{ $booking->coach->name ?? 'N/A' }}</td>
                            <td class="px-3 py-2">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                    @switch($booking->status)
                                        @case('pending') bg-yellow-100 text-yellow-800 @break
                                        @case('confirmed') bg-blue-100 text-blue-800 @break
                                        @case('completed') bg-green-100 text-green-800 @break
                                        @case('cancelled') bg-red-100 text-red-800 @break
                                        @default bg-gray-100 text-gray-800
                                    @endswitch
                                ">{{ ucfirst($booking->status) }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-3 py-4 text-sm text-gray-500 text-center">No recent bookings</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="xl:col-span-1 bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Top Services</h3>
            <ul class="space-y-3">
                @forelse($topServices as $item)
                <li class="flex items-center justify-between">
                    <span class="text-sm text-gray-700">{{ $item->service->name ?? 'Unknown' }}</span>
                    <span class="text-sm font-semibold text-gray-900">{{ $item->count }}</span>
                </li>
                @empty
                <li class="text-sm text-gray-500">No service data available</li>
                @endforelse
            </ul>
        </div>

        <div class="xl:col-span-1 bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h3>
            <div class="space-y-4">
                @forelse($recentActivities->take(6) as $activity)
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-2 h-2 mt-2 rounded-full bg-blue-400"></div>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm text-gray-800">{{ $activity->description }}</p>
                        <p class="text-xs text-gray-400">{{ $activity->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-500">No recent activity</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'bar',
        data: {
            labels: @json($monthlyRevenue->pluck('month')),
            datasets: [{
                label: 'Revenue (KES)',
                data: @json($monthlyRevenue->pluck('total')),
                backgroundColor: 'rgba(99, 102, 241, 0.7)',
                borderColor: 'rgba(99, 102, 241, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true, ticks: { callback: v => 'KES ' + v.toLocaleString() } } }
        }
    });

    const bookingCtx = document.getElementById('bookingChart').getContext('2d');
    new Chart(bookingCtx, {
        type: 'doughnut',
        data: {
            labels: @json($bookingsByStatus->keys()),
            datasets: [{
                data: @json($bookingsByStatus->values()),
                backgroundColor: ['#f59e0b', '#3b82f6', '#10b981', '#ef4444', '#8b5cf6'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });

    const growthCtx = document.getElementById('userGrowthChart').getContext('2d');
    new Chart(growthCtx, {
        type: 'line',
        data: {
            labels: @json($userGrowth->pluck('month')),
            datasets: [{
                label: 'New Users',
                data: @json($userGrowth->pluck('count')),
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    // booking doughnut chart removed (use bookingChart)
});
</script>
@endpush
