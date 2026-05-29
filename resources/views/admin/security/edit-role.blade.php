@extends('layouts.admin')

@section('title', "Edit Role: {$role->name}")

@section('content')
<div class="w-full">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-2xl p-8 mb-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center shadow-lg shadow-red-600/30">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-3">
                        <h2 class="text-2xl font-bold text-white">Edit Role</h2>
                        <span class="px-3 py-1 bg-white/10 text-white text-sm rounded-lg font-medium border border-white/10">{{ $role->name }}</span>
                    </div>
                    <p class="text-gray-300 text-sm mt-1">Manage permissions for this role</p>
                </div>
            </div>
            <a href="{{ route('admin.security.index') }}" class="inline-flex items-center px-4 py-2.5 bg-white/10 hover:bg-white/20 text-white border border-white/20 rounded-xl text-sm font-medium transition-all backdrop-blur-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to Roles
            </a>
        </div>
    </div>

    <form action="{{ route('admin.security.update-role', $role) }}" method="POST">
        @csrf @method('PUT')

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 lg:px-8 py-4 border-b border-gray-100 flex items-center space-x-3">
                <div class="w-9 h-9 bg-gradient-to-br from-red-500 to-red-700 rounded-xl flex items-center justify-center shadow-sm">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-base font-bold text-gray-900">Permissions</h3>
            </div>

            <div class="p-6 lg:p-8 space-y-8">
                @forelse($permissions as $group => $perms)
                <div>
                    <div class="flex items-center justify-between mb-3 pb-2 border-b border-gray-100">
                        <h4 class="font-bold text-gray-900 capitalize text-sm tracking-wider">{{ $group }}</h4>
                        <label class="flex items-center text-xs text-gray-500 cursor-pointer hover:text-gray-700">
                            <input type="checkbox" onclick="document.querySelectorAll('#group-{{ $loop->index }} input[type=checkbox]').forEach(c => c.checked = this.checked)" class="w-3.5 h-3.5 text-red-600 rounded border-gray-300 mr-1.5 focus:ring-red-500">
                            Select All
                        </label>
                    </div>
                    <div id="group-{{ $loop->index }}" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                        @foreach($perms as $perm)
                        <label class="flex items-center p-2.5 rounded-xl border cursor-pointer transition-all {{ $role->permissions->contains('id', $perm->id) ? 'bg-red-50 border-red-200' : 'bg-gray-50 border-gray-100 hover:border-gray-200' }}">
                            <input type="checkbox" name="permissions[]" value="{{ $perm->name }}" {{ $role->permissions->contains('id', $perm->id) ? 'checked' : '' }} class="w-4 h-4 text-red-600 rounded border-gray-300 focus:ring-red-500">
                            <span class="ml-2.5 text-sm font-medium {{ $role->permissions->contains('id', $perm->id) ? 'text-red-700' : 'text-gray-700' }}">{{ $perm->name }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
                @empty
                <p class="text-gray-500 text-center py-8">No permissions found.</p>
                @endforelse
            </div>
        </div>

        <div class="flex items-center justify-end gap-4 mt-6">
            <a href="{{ route('admin.security.index') }}" class="px-6 py-3 border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 transition-all">Cancel</a>
            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white rounded-xl font-semibold text-sm transition-all hover:scale-105 shadow-lg shadow-red-600/20 flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                Save Permissions
            </button>
        </div>
    </form>
</div>
@endsection