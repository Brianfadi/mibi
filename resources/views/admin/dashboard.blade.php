@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-2xl p-6 lg:p-8 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-72 h-72 bg-red-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-56 h-56 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <div class="flex items-center space-x-3 mb-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-700 rounded-xl flex items-center justify-center shadow-lg shadow-red-600/30">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <h1 class="text-2xl font-bold text-white">Dashboard</h1>
                </div>
                <p class="text-gray-400 text-sm">Welcome back, {{ auth()->user()->name }}. Here's your MIBI overview.</p>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('admin.registrations.index') }}" class="inline-flex items-center px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-xl text-sm font-medium transition-all backdrop-blur-sm border border-white/10">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Registrations
                </a>
                <a href="{{ route('admin.blog.create') }}" class="inline-flex items-center px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-xl text-sm font-medium transition-all backdrop-blur-sm border border-white/10">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    New Post
                </a>
                <a href="{{ route('admin.bookings.index') }}" class="inline-flex items-center px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-xl text-sm font-medium transition-all backdrop-blur-sm border border-white/10">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Bookings
                </a>
            </div>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3 lg:gap-4">
        @php
        $cards = [
            ['label' => 'Total Users', 'value' => number_format($stats['total_users']), 'sub' => $stats['new_users_today'] . ' new today', 'color' => 'blue', 'icon' => 'users'],
            ['label' => 'Active Users', 'value' => number_format($stats['active_users']), 'sub' => null, 'color' => 'green', 'icon' => 'activity'],
            ['label' => 'Pending Bookings', 'value' => number_format($stats['pending_bookings']), 'sub' => null, 'color' => 'yellow', 'icon' => 'calendar'],
            ['label' => 'Monthly Revenue', 'value' => 'KES ' . number_format($stats['monthly_revenue']), 'sub' => null, 'color' => 'purple', 'icon' => 'dollar'],
            ['label' => 'Unread Messages', 'value' => number_format($stats['unread_messages']), 'sub' => null, 'color' => 'red', 'icon' => 'chat'],
            ['label' => 'Subscribers', 'value' => number_format($stats['total_subscribers']), 'sub' => '+' . $stats['new_subscribers_month'] . ' this month', 'color' => 'indigo', 'icon' => 'mail'],
        ];
        $colorMap = [
            'blue' => ['bg' => 'from-blue-500/10 to-blue-600/5', 'border' => 'border-blue-500/20', 'icon_bg' => 'bg-blue-500/15', 'icon' => 'text-blue-400', 'badge' => 'bg-blue-500/20 text-blue-300'],
            'green' => ['bg' => 'from-green-500/10 to-green-600/5', 'border' => 'border-green-500/20', 'icon_bg' => 'bg-green-500/15', 'icon' => 'text-green-400', 'badge' => 'bg-green-500/20 text-green-300'],
            'yellow' => ['bg' => 'from-yellow-500/10 to-yellow-600/5', 'border' => 'border-yellow-500/20', 'icon_bg' => 'bg-yellow-500/15', 'icon' => 'text-yellow-400', 'badge' => 'bg-yellow-500/20 text-yellow-300'],
            'purple' => ['bg' => 'from-purple-500/10 to-purple-600/5', 'border' => 'border-purple-500/20', 'icon_bg' => 'bg-purple-500/15', 'icon' => 'text-purple-400', 'badge' => 'bg-purple-500/20 text-purple-300'],
            'red' => ['bg' => 'from-red-500/10 to-red-600/5', 'border' => 'border-red-500/20', 'icon_bg' => 'bg-red-500/15', 'icon' => 'text-red-400', 'badge' => 'bg-red-500/20 text-red-300'],
            'indigo' => ['bg' => 'from-indigo-500/10 to-indigo-600/5', 'border' => 'border-indigo-500/20', 'icon_bg' => 'bg-indigo-500/15', 'icon' => 'text-indigo-400', 'badge' => 'bg-indigo-500/20 text-indigo-300'],
        ];
        @endphp
        @foreach($cards as $card)
        @php $c = $colorMap[$card['color']]; @endphp
        <div class="bg-gradient-to-br {{ $c['bg'] }} rounded-2xl border {{ $c['border'] }} p-4 lg:p-5 hover:shadow-lg transition-all duration-300 hover:-translate-y-0.5">
            <div class="flex items-center justify-between mb-3">
                <div class="w-9 h-9 {{ $c['icon_bg'] }} rounded-xl flex items-center justify-center">
                    @if($card['icon'] === 'users')
                        <svg class="w-4 h-4 {{ $c['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    @elseif($card['icon'] === 'activity')
                        <svg class="w-4 h-4 {{ $c['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z"/></svg>
                    @elseif($card['icon'] === 'calendar')
                        <svg class="w-4 h-4 {{ $c['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    @elseif($card['icon'] === 'dollar')
                        <svg class="w-4 h-4 {{ $c['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    @elseif($card['icon'] === 'chat')
                        <svg class="w-4 h-4 {{ $c['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    @elseif($card['icon'] === 'mail')
                        <svg class="w-4 h-4 {{ $c['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    @endif
                </div>
                <span class="text-2xl font-bold text-white">{{ $card['value'] }}</span>
            </div>
            <p class="text-xs text-gray-400 font-medium">{{ $card['label'] }}</p>
            @if($card['sub'])
            <p class="text-xs {{ $c['badge'] }} mt-1.5 inline-block px-2 py-0.5 rounded-full">{{ $card['sub'] }}</p>
            @endif
        </div>
        @endforeach
    </div>

    <!-- Secondary Stats -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
        @php
        $secCards = [
            ['label' => 'Pending Registrations', 'value' => number_format($stats['pending_registrations']), 'color' => 'orange', 'icon' => 'clipboard'],
            ['label' => 'Open Tickets', 'value' => number_format($stats['open_tickets']), 'color' => 'teal', 'icon' => 'ticket'],
            ['label' => 'Active Coaches', 'value' => number_format($stats['active_coaches']), 'color' => 'pink', 'icon' => 'briefcase'],
            ['label' => 'Total Clients', 'value' => number_format($stats['total_clients']), 'color' => 'cyan', 'icon' => 'people'],
        ];
        $secColorMap = [
            'orange' => ['bg' => 'bg-orange-500/10', 'icon' => 'text-orange-400', 'icon_bg' => 'bg-orange-500/15'],
            'teal' => ['bg' => 'bg-teal-500/10', 'icon' => 'text-teal-400', 'icon_bg' => 'bg-teal-500/15'],
            'pink' => ['bg' => 'bg-pink-500/10', 'icon' => 'text-pink-400', 'icon_bg' => 'bg-pink-500/15'],
            'cyan' => ['bg' => 'bg-cyan-500/10', 'icon' => 'text-cyan-400', 'icon_bg' => 'bg-cyan-500/15'],
        ];
        @endphp
        @foreach($secCards as $card)
        @php $c = $secColorMap[$card['color']]; @endphp
        <div class="bg-gray-900/80 backdrop-blur-sm rounded-xl border border-gray-800 p-4 flex items-center space-x-4 hover:border-gray-700 transition-all">
            <div class="w-10 h-10 {{ $c['icon_bg'] }} rounded-xl flex items-center justify-center flex-shrink-0">
                @if($card['icon'] === 'clipboard')
                    <svg class="w-4 h-4 {{ $c['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                @elseif($card['icon'] === 'ticket')
                    <svg class="w-4 h-4 {{ $c['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/></svg>
                @elseif($card['icon'] === 'briefcase')
                    <svg class="w-4 h-4 {{ $c['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                @elseif($card['icon'] === 'people')
                    <svg class="w-4 h-4 {{ $c['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                @endif
            </div>
            <div>
                <p class="text-xs text-gray-500">{{ $card['label'] }}</p>
                <p class="text-lg font-bold text-white">{{ $card['value'] }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Charts & Recent Users -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6">
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-gray-900">Monthly Revenue</h3>
                </div>
                <span class="text-xs text-gray-400 bg-gray-50 px-3 py-1 rounded-full">This year</span>
            </div>
            <canvas id="revenueChart" height="80"></canvas>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-gray-900">Recent Signups</h3>
                </div>
                <a href="{{ route('admin.users.index') }}" class="text-xs text-red-600 hover:underline font-medium">View all</a>
            </div>
            <ul class="space-y-3">
                @forelse($recentUsers as $user)
                <li class="flex items-center justify-between p-2.5 rounded-xl hover:bg-gray-50 transition-colors">
                    <div class="flex items-center space-x-3 min-w-0">
                        <div class="w-9 h-9 bg-gradient-to-br from-red-500 to-red-700 rounded-xl flex items-center justify-center text-white text-sm font-bold flex-shrink-0">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-gray-900 truncate">{{ $user->name }}</p>
                            <p class="text-xs text-gray-400 truncate">{{ $user->email }}</p>
                        </div>
                    </div>
                    <span class="text-xs text-gray-400 flex-shrink-0 ml-2">{{ $user->created_at->diffForHumans() }}</span>
                </li>
                @empty
                <li class="text-sm text-gray-500 text-center py-6">No recent signups</li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Doughnut + Line Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center space-x-3 mb-5">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <h3 class="text-base font-bold text-gray-900">Bookings by Status</h3>
            </div>
            <div class="flex justify-center">
                <canvas id="bookingChart" height="180" class="max-w-[280px]"></canvas>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center space-x-3 mb-5">
                <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
                <h3 class="text-base font-bold text-gray-900">User Growth</h3>
            </div>
            <canvas id="userGrowthChart" height="160"></canvas>
        </div>
    </div>

    <!-- Recent Bookings, Top Services, Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6">
        <div class="lg:col-span-1 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-gray-900">Recent Bookings</h3>
                </div>
                <a href="{{ route('admin.bookings.index') }}" class="text-xs text-red-600 hover:underline font-medium">View all</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="text-left text-xs font-semibold text-gray-500 uppercase pb-2">Client</th>
                            <th class="text-left text-xs font-semibold text-gray-500 uppercase pb-2">Service</th>
                            <th class="text-left text-xs font-semibold text-gray-500 uppercase pb-2">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($recentBookings->take(5) as $booking)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-2.5 text-sm font-medium text-gray-900">{{ $booking->user->name ?? 'N/A' }}</td>
                            <td class="py-2.5 text-sm text-gray-600">{{ $booking->service->title ?? 'N/A' }}</td>
                            <td class="py-2.5">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($booking->status === 'pending') bg-yellow-100 text-yellow-800 border border-yellow-200
                                    @elseif($booking->status === 'confirmed') bg-blue-100 text-blue-800 border border-blue-200
                                    @elseif($booking->status === 'completed') bg-green-100 text-green-800 border border-green-200
                                    @elseif($booking->status === 'cancelled') bg-red-100 text-red-800 border border-red-200
                                    @else bg-gray-100 text-gray-800 @endif
                                ">{{ ucfirst($booking->status) }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="py-6 text-sm text-gray-500 text-center">No recent bookings</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="lg:col-span-1 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center space-x-3 mb-5">
                <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
                <h3 class="text-base font-bold text-gray-900">Top Services</h3>
            </div>
            <ul class="space-y-1">
                @forelse($topServices as $item)
                <li class="flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 transition-colors">
                    <span class="text-sm text-gray-700 font-medium">{{ $item->service->title ?? 'Unknown' }}</span>
                    <span class="text-sm font-bold text-gray-900 bg-gray-100 w-7 h-7 rounded-full flex items-center justify-center">{{ $item->count }}</span>
                </li>
                @empty
                <li class="text-sm text-gray-500 text-center py-6">No service data available</li>
                @endforelse
            </ul>
        </div>

        <div class="lg:col-span-1 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center space-x-3 mb-5">
                <div class="w-8 h-8 bg-rose-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-base font-bold text-gray-900">Recent Activity</h3>
            </div>
            <div class="space-y-1">
                @forelse($recentActivities->take(6) as $activity)
                <div class="flex items-start space-x-3 p-3 rounded-xl hover:bg-gray-50 transition-colors">
                    <div class="flex-shrink-0 mt-1.5">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-400"></div>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm text-gray-800">{{ $activity->description }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $activity->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-500 text-center py-6">No recent activity</p>
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
    var isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    var gridColor = isDark ? 'rgba(255,255,255,0.05)' : 'rgba(0,0,0,0.06)';

    var revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'bar',
        data: {
            labels: @json($monthlyRevenue->pluck('month')),
            datasets: [{
                label: 'Revenue (KES)',
                data: @json($monthlyRevenue->pluck('total')),
                backgroundColor: 'rgba(220, 38, 38, 0.7)',
                borderColor: 'rgba(220, 38, 38, 1)',
                borderWidth: 1,
                borderRadius: 6,
                barPercentage: 0.6,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: gridColor }, ticks: { callback: function(v) { return 'KES ' + v.toLocaleString(); } } },
                x: { grid: { display: false } }
            }
        }
    });

    var bookingCtx = document.getElementById('bookingChart').getContext('2d');
    new Chart(bookingCtx, {
        type: 'doughnut',
        data: {
            labels: @json($bookingsByStatus->keys()),
            datasets: [{
                data: @json($bookingsByStatus->values()),
                backgroundColor: ['#f59e0b', '#3b82f6', '#10b981', '#ef4444', '#8b5cf6'],
                borderWidth: 0,
                hoverOffset: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            cutout: '70%',
            plugins: { legend: { position: 'bottom', labels: { padding: 12, usePointStyle: true, pointStyle: 'circle' } } }
        }
    });

    var growthCtx = document.getElementById('userGrowthChart').getContext('2d');
    new Chart(growthCtx, {
        type: 'line',
        data: {
            labels: @json($userGrowth->pluck('month')),
            datasets: [{
                label: 'New Users',
                data: @json($userGrowth->pluck('count')),
                borderColor: '#dc2626',
                backgroundColor: 'rgba(220, 38, 38, 0.08)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#dc2626',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: gridColor } },
                x: { grid: { display: false } }
            }
        }
    });
});
</script>
@endpush