@extends('layouts.admin')

@section('title', 'Security')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold">Roles & Permissions</h2>
    <a href="{{ route('admin.security.logs') }}" class="border border-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm hover:bg-gray-50 transition">View Activity Logs</a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
    @forelse($roles as $role)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <div class="flex items-center justify-between mb-3">
            <div>
                <h3 class="font-semibold text-gray-900">{{ $role->name }}</h3>
                <p class="text-xs text-gray-500">{{ $role->guard_name }}</p>
            </div>
            <a href="{{ route('admin.security.edit-role', $role) }}" class="text-red-600 hover:text-red-700 text-sm">Edit</a>
        </div>
        <div class="flex flex-wrap gap-1.5">
            @forelse($role->permissions as $perm)
            <span class="text-xs bg-red-50 text-red-700 px-2 py-0.5 rounded-full">{{ $perm->name }}</span>
            @empty
            <span class="text-xs text-gray-400">No permissions assigned</span>
            @endforelse
        </div>
    </div>
    @empty
    <div class="col-span-full bg-white rounded-xl shadow-sm border border-gray-100 p-6 text-center text-gray-500">
        No roles found.
    </div>
    @endforelse
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
    <h2 class="text-lg font-semibold mb-4">Create New Role</h2>
    <form action="{{ route('admin.security.create-role') }}" method="POST" class="flex items-end gap-4 max-w-lg">
        @csrf
        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700 mb-1">Role Name *</label>
            <input type="text" name="name" required class="w-full px-4 py-2 border rounded-lg text-sm" placeholder="e.g. editor, moderator">
        </div>
        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg text-sm hover:bg-red-700 transition">Create Role</button>
    </form>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-lg font-semibold">Admin Users</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="text-left px-6 py-3 font-medium">Name</th>
                    <th class="text-left px-6 py-3 font-medium">Email</th>
                    <th class="text-left px-6 py-3 font-medium">Last Login</th>
                    <th class="text-left px-6 py-3 font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($admins as $admin)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium">{{ $admin->name }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $admin->email }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $admin->last_login_at?->diffForHumans() ?? '—' }}</td>
                    <td class="px-6 py-4">
                        <span class="text-xs px-2 py-1 rounded-full {{ $admin->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $admin->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">No admin users found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
