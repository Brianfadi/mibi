@extends('layouts.admin')

@section('title', 'Add Coach')

@section('breadcrumb')
    <span class="mx-2">/</span>
    <a href="{{ route('admin.coaches.index') }}" class="hover:text-gray-600">Coaches</a>
    <span class="mx-2">/</span>
    <span class="text-gray-600">Add Coach</span>
@endsection

@section('content')
<div class="w-full">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-2xl p-8 mb-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="relative flex items-center space-x-4">
            <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center shadow-lg shadow-red-600/30">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-white">Add Coach</h2>
                <p class="text-gray-300 text-sm mt-1">Create a new coaching profile for MIBI</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8">
        <form action="{{ route('admin.coaches.store') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Two-column layout -->
            <div class="grid lg:grid-cols-2 gap-6">
                <!-- Left: Account Info -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-900 uppercase tracking-wider mb-2">Full Name *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Dr. James M." class="w-full px-5 py-3.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-base placeholder-gray-400 @error('name') border-red-500 @enderror">
                        @error('name') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-900 uppercase tracking-wider mb-2">Email *</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="coach@mibi.africa" class="w-full pl-12 pr-5 py-3.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-base placeholder-gray-400 @error('email') border-red-500 @enderror">
                        </div>
                        @error('email') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-900 uppercase tracking-wider mb-2">Phone</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="+254 7XX XXX XXX" class="w-full pl-12 pr-5 py-3.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-base placeholder-gray-400 @error('phone') border-red-500 @enderror">
                        </div>
                        @error('phone') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-900 uppercase tracking-wider mb-2">Password *</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <input type="password" name="password" required placeholder="Min. 8 characters" class="w-full pl-12 pr-5 py-3.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-base placeholder-gray-400 @error('password') border-red-500 @enderror">
                        </div>
                        @error('password') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Right: Bio & Status -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-900 uppercase tracking-wider mb-2">Bio</label>
                        <textarea name="bio" rows="10" placeholder="Write a professional bio for this coach..." class="w-full px-5 py-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent resize-none leading-relaxed placeholder-gray-400 @error('bio') border-red-500 @enderror">{{ old('bio') }}</textarea>
                        <p class="text-xs text-gray-400 mt-1.5">Appears on the coaching profile page</p>
                        @error('bio') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                        <label class="flex items-center text-sm font-bold text-gray-900 uppercase tracking-wider mb-3">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                            Account Status
                        </label>
                        <label class="flex items-center p-3 bg-white rounded-xl border border-gray-100 cursor-pointer hover:border-green-300 transition-colors">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-4 h-4 text-green-600 focus:ring-green-500 rounded">
                            <span class="ml-3 text-sm font-medium text-gray-900">Active</span>
                            <span class="ml-auto text-xs text-gray-400">Coach can log in and accept bookings</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                <a href="{{ route('admin.coaches.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition-colors flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to Coaches
                </a>
                <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-8 py-3 rounded-xl font-semibold text-sm transition-all hover:scale-105 shadow-lg shadow-red-600/20 flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                    <span>Create Coach</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection