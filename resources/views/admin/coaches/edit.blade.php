@extends('layouts.admin')

@section('title', 'Edit Coach')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.coaches.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back to Coaches</a>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold mb-4">Edit: {{ $coach->name }}</h2>
        <form action="{{ route('admin.coaches.update', $coach) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium mb-1">Name *</label>
                <input type="text" name="name" value="{{ old('name', $coach->name) }}" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email *</label>
                <input type="email" name="email" value="{{ old('email', $coach->email) }}" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $coach->phone) }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Bio</label>
                <textarea name="bio" rows="4" class="w-full px-4 py-2 border rounded-lg">{{ old('bio', $coach->bio) }}</textarea>
            </div>
            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $coach->is_active) ? 'checked' : '' }} class="rounded">
                    <span class="ml-2 text-sm">Active</span>
                </label>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">Update Coach</button>
                <a href="{{ route('admin.coaches.index') }}" class="border border-gray-200 text-gray-700 px-6 py-2 rounded-lg text-sm hover:bg-gray-50">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection