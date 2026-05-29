@extends('layouts.admin')

@section('title', 'Live Sessions')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-2xl p-6 lg:p-8 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center shadow-lg shadow-red-600/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Live Sessions</h2>
                    <p class="text-gray-400 text-sm mt-0.5">Manage your MIBI community sessions</p>
                </div>
            </div>
            <a href="{{ route('admin.live-sessions.create') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white rounded-xl text-sm font-semibold transition-all hover:scale-105 shadow-lg shadow-red-600/20">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Create Session
            </a>
        </div>
    </div>

    <!-- Stats -->
    @php
        $activeCount = $sessions->where('is_active', true)->count();
        $upcomingCount = $sessions->where('is_active', true)->filter(fn($s) => $s->isUpcoming())->count();
        $totalParticipants = $sessions->sum('participants_count');
    @endphp
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-gray-900">{{ $sessions->total() }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Total Sessions</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-green-600">{{ $activeCount }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Active Sessions</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-red-600">{{ $activeCount - $upcomingCount }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Past Sessions</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-gray-900">{{ $totalParticipants }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Total Registrations</p>
        </div>
    </div>

    <!-- Sessions Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 lg:gap-6">
        @forelse($sessions as $session)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
            <!-- Top bar -->
            <div class="h-1.5 bg-gradient-to-r from-red-500 to-red-700"></div>

            <div class="p-6">
                <!-- Title & Status -->
                <div class="flex items-start justify-between gap-3 mb-3">
                    <h3 class="font-bold text-gray-900 leading-tight">{{ $session->title }}</h3>
                    <span class="flex-shrink-0 inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium {{ $session->is_active ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-red-100 text-red-700 border border-red-200' }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $session->is_active ? 'bg-green-500' : 'bg-red-500' }} mr-1.5"></span>
                        {{ $session->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>

                <!-- Type & Price -->
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-xs px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 font-medium capitalize">{{ $session->session_type }}</span>
                    @if($session->is_free)
                        <span class="text-xs px-2.5 py-1 rounded-lg bg-green-100 text-green-700 font-medium">Free</span>
                    @else
                        <span class="text-xs px-2.5 py-1 rounded-lg bg-yellow-100 text-yellow-700 font-medium">{{ $session->formatted_price }}</span>
                    @endif
                </div>

                <!-- Date/Time Info -->
                <div class="space-y-2 mb-4 text-sm text-gray-600">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>{{ $session->session_date->format('D, M j, Y') }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>{{ $session->start_time_formatted }}{{ $session->end_time ? ' - ' . $session->end_time_formatted : '' }}</span>
                    </div>
                    @if($session->timezone)
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>{{ $session->timezone }}</span>
                    </div>
                    @endif
                </div>

                <!-- Registration Progress -->
                <div class="mb-4">
                    <div class="flex items-center justify-between text-sm mb-1.5">
                        <span class="text-gray-500 font-medium">Registered</span>
                        <span class="font-semibold {{ $session->max_participants && $session->participants_count >= $session->max_participants ? 'text-red-600' : 'text-gray-900' }}">
                            {{ $session->participants_count }}{{ $session->max_participants ? '/' . $session->max_participants : '' }}
                        </span>
                    </div>
                    @if($session->max_participants)
                    <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-red-500 to-red-600 rounded-full transition-all" style="width: {{ min(($session->participants_count / $session->max_participants) * 100, 100) }}%"></div>
                    </div>
                    @endif
                </div>

                <!-- Actions -->
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <a href="{{ route('admin.live-sessions.edit', $session) }}" class="flex-1 text-center border border-gray-200 text-gray-700 px-3 py-2.5 rounded-xl text-sm font-medium hover:bg-gray-50 hover:border-gray-300 transition-all flex items-center justify-center">
                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Edit
                    </a>
                    <form action="{{ route('admin.live-sessions.destroy', $session) }}" method="POST" onsubmit="return confirm('Delete this session?')" class="flex-1">
                        @csrf @method('DELETE')
                        <button type="submit" class="w-full text-center border border-red-200 text-red-600 px-3 py-2.5 rounded-xl text-sm font-medium hover:bg-red-50 hover:border-red-300 transition-all flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-white rounded-2xl shadow-sm border border-gray-100 p-16 text-center">
            <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
            </div>
            <p class="text-gray-500 font-medium">No live sessions yet</p>
            <p class="text-gray-400 text-sm mt-1">Create your first community session.</p>
            <a href="{{ route('admin.live-sessions.create') }}" class="inline-flex items-center mt-4 px-4 py-2 bg-red-600 text-white rounded-xl text-sm font-medium hover:bg-red-700 transition-all">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Create Session
            </a>
        </div>
        @endforelse
    </div>

    @if($sessions->hasPages())
    <div class="mt-6">
        {{ $sessions->links() }}
    </div>
    @endif
</div>
@endsection