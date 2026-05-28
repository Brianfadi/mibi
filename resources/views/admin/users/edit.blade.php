@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back to Users</a>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold mb-4">Edit: {{ $user->name }}</h2>
        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium mb-1">Name *</label>
                <input type="text" name="name" value="{{ $user->name }}" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email *</label>
                <input type="email" name="email" value="{{ $user->email }}" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Phone</label>
                <input type="tel" name="phone" value="{{ $user->phone }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Roles</label>
                <div class="space-y-2">
                    @foreach(\Spatie\Permission\Models\Role::all() as $role)
                    <label class="flex items-center">
                        <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'checked' : '' }} class="rounded">
                        <span class="ml-2 text-sm capitalize">{{ $role->name }}</span>
                    </label>
                    @endforeach
                </div>
            </div>
            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ $user->is_active ? 'checked' : '' }} class="rounded">
                    <span class="ml-2 text-sm">Active</span>
                </label>
            </div>
            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">Update User</button>
        </form>
        <div class="mt-6 pt-6 border-t border-gray-100 flex gap-3">
            @if($user->is_active)
            <form action="{{ route('admin.users.deactivate', $user) }}" method="POST">
                @csrf
                <button type="submit" class="text-red-600 text-sm hover:text-red-700">Deactivate User</button>
            </form>
            @else
            <form action="{{ route('admin.users.activate', $user) }}" method="POST">
                @csrf
                <button type="submit" class="text-green-600 text-sm hover:text-green-700">Activate User</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
