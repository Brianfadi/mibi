@extends('layouts.admin')

@section('title', 'Roles & Permissions')

@section('content')
<div class="w-full space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-2xl p-6 lg:p-8 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center shadow-lg shadow-red-600/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Roles & Permissions</h2>
                    <p class="text-gray-400 text-sm mt-0.5">Manage access control for your platform</p>
                </div>
            </div>
            <a href="{{ route('admin.security.logs') }}" class="inline-flex items-center px-4 py-2.5 bg-white/10 hover:bg-white/20 text-white border border-white/20 rounded-xl text-sm font-medium transition-all backdrop-blur-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Activity Logs
            </a>
        </div>
    </div>

    <!-- Stats -->
    @php
        $totalUsers = $admins->count();
        $activeUsers = $admins->where('is_active', true)->count();
    @endphp
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-gray-900">{{ $roles->count() }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Roles</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-gray-900">{{ $permissions->count() }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Permissions</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-gray-900">{{ $totalUsers }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Admin Users</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-green-600">{{ $activeUsers }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Active Admins</p>
        </div>
    </div>

    <!-- Roles Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 lg:gap-6">
        @forelse($roles as $role)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
            <div class="h-1.5 bg-gradient-to-r from-red-500 to-red-700"></div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-red-100 to-red-200 rounded-xl flex items-center justify-center">
                            <span class="text-sm font-bold text-red-700 uppercase">{{ substr($role->name, 0, 2) }}</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">{{ $role->name }}</h3>
                            <p class="text-xs text-gray-400">{{ $role->guard_name }}</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.security.edit-role', $role) }}" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Edit Role">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </a>
                </div>
                <div class="flex flex-wrap gap-1.5">
                    @forelse($role->permissions as $perm)
                    <span class="text-xs bg-red-50 text-red-700 px-2.5 py-1 rounded-full font-medium border border-red-100">{{ $perm->name }}</span>
                    @empty
                    <span class="text-xs text-gray-400 italic">No permissions assigned</span>
                    @endforelse
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-white rounded-2xl shadow-sm border border-gray-100 p-16 text-center">
            <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <p class="text-gray-500 font-medium">No roles found</p>
        </div>
        @endforelse
    </div>

    <!-- Create Role -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 lg:px-8 py-4 border-b border-gray-100 flex items-center space-x-3">
            <div class="w-9 h-9 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center shadow-sm">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <h3 class="text-base font-bold text-gray-900">Create New Role</h3>
        </div>
        <div class="p-6 lg:p-8">
            <form action="{{ route('admin.security.create-role') }}" method="POST" class="flex items-end gap-4 max-w-xl">
                @csrf
                <div class="flex-1">
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-1.5">Role Name *</label>
                    <input type="text" name="name" required placeholder="e.g. editor, moderator" class="w-full px-5 py-3.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-sm">
                </div>
                <button type="submit" class="px-6 py-3.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white rounded-xl font-semibold text-sm transition-all hover:scale-105 shadow-lg shadow-red-600/20 flex items-center">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Create Role
                </button>
            </form>
        </div>
    </div>

    <!-- Admin Users -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 lg:px-8 py-4 border-b border-gray-100 flex items-center space-x-3">
            <div class="w-9 h-9 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center shadow-sm">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
            <h3 class="text-base font-bold text-gray-900">Admin Users</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Name</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Email</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Last Login</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($admins as $admin)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-red-100 to-red-200 rounded-xl flex items-center justify-center text-xs font-bold text-red-700 uppercase">
                                    {{ substr($admin->name, 0, 2) }}
                                </div>
                                <span class="font-medium text-gray-900">{{ $admin->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $admin->email }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $admin->last_login_at?->diffForHumans() ?? '—' }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium {{ $admin->is_active ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-red-100 text-red-700 border border-red-200' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $admin->is_active ? 'bg-green-500' : 'bg-red-500' }} mr-1.5"></span>
                                {{ $admin->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">No admin users found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection