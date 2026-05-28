@extends('layouts.admin')

@section('title', 'Edit Program')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.programs.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back</a>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold mb-4">Edit: {{ $program->title }}</h2>
        <form action="{{ route('admin.programs.update', $program) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium mb-1">Title *</label>
                <input type="text" name="title" value="{{ $program->title }}" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Short Description</label>
                <input type="text" name="short_description" value="{{ $program->short_description }}" maxlength="300" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Description</label>
                <textarea name="description" rows="5" class="w-full px-4 py-2 border rounded-lg">{{ $program->description }}</textarea>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Price</label>
                    <input type="number" name="price" step="0.01" min="0" value="{{ $program->price }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Currency</label>
                    <select name="currency" class="w-full px-4 py-2 border rounded-lg">
                        <option value="KES" {{ $program->currency === 'KES' ? 'selected' : '' }}>KES</option>
                        <option value="USD" {{ $program->currency === 'USD' ? 'selected' : '' }}>USD</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ $program->sort_order }}" min="0" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Duration</label>
                    <input type="number" name="duration_value" value="{{ $program->duration_value }}" min="1" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Unit</label>
                    <select name="duration_unit" class="w-full px-4 py-2 border rounded-lg">
                        <option value="weeks" {{ $program->duration_unit === 'weeks' ? 'selected' : '' }}>Weeks</option>
                        <option value="months" {{ $program->duration_unit === 'months' ? 'selected' : '' }}>Months</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Max Participants</label>
                    <input type="number" name="max_participants" value="{{ $program->max_participants }}" min="1" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Features (JSON)</label>
                <input type="text" name="features" value="{{ is_array($program->features) ? json_encode($program->features) : $program->features }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Prerequisites (JSON)</label>
                <input type="text" name="prerequisites" value="{{ is_array($program->prerequisites) ? json_encode($program->prerequisites) : $program->prerequisites }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div class="flex items-center gap-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" value="1" {{ $program->is_featured ? 'checked' : '' }} class="rounded">
                    <span class="ml-2 text-sm">Featured</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ $program->is_active ? 'checked' : '' }} class="rounded">
                    <span class="ml-2 text-sm">Active</span>
                </label>
            </div>
            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">Update Program</button>
        </form>
    </div>
</div>
@endsection
