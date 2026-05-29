@extends('layouts.admin')

@section('title', 'Coaches')

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
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Coaches</h2>
                    <p class="text-gray-400 text-sm mt-0.5">Manage your MIBI coaching team</p>
                </div>
            </div>
            <a href="{{ route('admin.coaches.create') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white rounded-xl text-sm font-semibold transition-all hover:scale-105 shadow-lg shadow-red-600/20">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                Add Coach
            </a>
        </div>
    </div>

    <!-- Coach Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 lg:gap-6">
        @forelse($coaches as $coach)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
            <!-- Top accent -->
            <div class="h-1.5 bg-gradient-to-r from-red-500 to-red-700"></div>
            <div class="p-6">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center text-white text-xl font-bold shadow-sm flex-shrink-0">
                        {{ substr($coach->name, 0, 1) }}
                    </div>
                    <div class="min-w-0 flex-1">
                        <h3 class="font-bold text-gray-900 truncate">{{ $coach->name }}</h3>
                        <p class="text-sm text-gray-500 truncate">{{ $coach->email }}</p>
                    </div>
                    <span class="flex-shrink-0 inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium {{ $coach->is_active ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-red-100 text-red-700 border border-red-200' }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $coach->is_active ? 'bg-green-500' : 'bg-red-500' }} mr-1.5"></span>
                        {{ $coach->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>

                <div class="grid grid-cols-2 gap-3 mb-5">
                    <div class="bg-gray-50 rounded-xl p-3.5 text-center border border-gray-100">
                        <p class="text-xl font-bold text-gray-900">{{ $coach->sessions_completed ?? 0 }}</p>
                        <p class="text-xs text-gray-500 font-medium">Completed</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3.5 text-center border border-gray-100">
                        <p class="text-xl font-bold text-gray-900">{{ $coach->upcoming_sessions ?? 0 }}</p>
                        <p class="text-xs text-gray-500 font-medium">Upcoming</p>
                    </div>
                </div>

                @if($coach->phone)
                <p class="text-xs text-gray-400 mb-4 flex items-center">
                    <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    {{ $coach->phone }}
                </p>
                @endif

                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <a href="{{ route('admin.coaches.show', $coach) }}" class="flex-1 text-center border border-gray-200 text-gray-700 px-3 py-2.5 rounded-xl text-sm font-medium hover:bg-gray-50 hover:border-gray-300 transition-all">
                        <svg class="w-3.5 h-3.5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        Profile
                    </a>
                    <a href="{{ route('admin.coaches.edit', $coach) }}" class="flex-1 text-center bg-red-600 hover:bg-red-700 text-white px-3 py-2.5 rounded-xl text-sm font-medium transition-all">
                        <svg class="w-3.5 h-3.5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Edit
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-white rounded-2xl shadow-sm border border-gray-100 p-16 text-center">
            <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <p class="text-gray-500 font-medium">No coaches found</p>
            <p class="text-gray-400 text-sm mt-1">Get started by adding your first coach.</p>
            <a href="{{ route('admin.coaches.create') }}" class="inline-flex items-center mt-4 px-4 py-2 bg-red-600 text-white rounded-xl text-sm font-medium hover:bg-red-700 transition-all">Add Coach</a>
        </div>
        @endforelse
    </div>

    @if($coaches->hasPages())
    <div class="mt-6">
        {{ $coaches->links() }}
    </div>
    @endif
</div>
@endsection