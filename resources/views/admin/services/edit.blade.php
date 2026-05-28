@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.services.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back to Services</a>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold mb-4">Edit: {{ $service->title }}</h2>
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium mb-1">Title *</label>
                <input type="text" name="title" value="{{ $service->title }}" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Short Description</label>
                <input type="text" name="short_description" value="{{ $service->short_description }}" maxlength="300" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Description</label>
                <textarea name="description" rows="5" class="w-full px-4 py-2 border rounded-lg">{{ $service->description }}</textarea>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Price</label>
                    <input type="number" name="price" step="0.01" min="0" value="{{ $service->price }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Currency</label>
                    <select name="currency" class="w-full px-4 py-2 border rounded-lg">
                        <option value="KES" {{ $service->currency === 'KES' ? 'selected' : '' }}>KES</option>
                        <option value="USD" {{ $service->currency === 'USD' ? 'selected' : '' }}>USD</option>
                        <option value="EUR" {{ $service->currency === 'EUR' ? 'selected' : '' }}>EUR</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Duration (minutes)</label>
                    <input type="number" name="duration_minutes" min="15" step="15" value="{{ $service->duration_minutes }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Session Type</label>
                <select name="session_type" class="w-full px-4 py-2 border rounded-lg">
                    <option value="individual" {{ $service->session_type === 'individual' ? 'selected' : '' }}>Individual</option>
                    <option value="couples" {{ $service->session_type === 'couples' ? 'selected' : '' }}>Couples</option>
                    <option value="group" {{ $service->session_type === 'group' ? 'selected' : '' }}>Group</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Highlights (JSON)</label>
                <input type="text" name="highlights" value="{{ is_array($service->highlights) ? json_encode($service->highlights) : $service->highlights }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Icon</label>
                    <input type="file" name="icon" accept="image/*" class="w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Image</label>
                    <input type="file" name="image" accept="image/*" class="w-full">
                </div>
            </div>
            <div class="flex items-center gap-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ $service->is_active ? 'checked' : '' }} class="rounded">
                    <span class="ml-2 text-sm">Active</span>
                </label>
                <div>
                    <label class="block text-sm font-medium mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ $service->sort_order }}" min="0" class="w-24 px-4 py-2 border rounded-lg">
                </div>
            </div>
            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">Update Service</button>
        </form>
    </div>
</div>
@endsection
