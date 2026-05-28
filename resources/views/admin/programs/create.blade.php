@extends('layouts.admin')

@section('title', 'New Program')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.programs.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back</a>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold mb-4">New Coaching Program</h2>
        <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Title *</label>
                <input type="text" name="title" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Short Description</label>
                <input type="text" name="short_description" maxlength="300" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Description</label>
                <textarea name="description" rows="5" class="w-full px-4 py-2 border rounded-lg"></textarea>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Price</label>
                    <input type="number" name="price" step="0.01" min="0" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Currency</label>
                    <select name="currency" class="w-full px-4 py-2 border rounded-lg">
                        <option value="KES">KES</option>
                        <option value="USD">USD</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="0" min="0" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Duration Value</label>
                    <input type="number" name="duration_value" min="1" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Duration Unit</label>
                    <select name="duration_unit" class="w-full px-4 py-2 border rounded-lg">
                        <option value="weeks">Weeks</option>
                        <option value="months">Months</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Max Participants</label>
                    <input type="number" name="max_participants" min="1" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Features (JSON array)</label>
                <input type="text" name="features" placeholder='["Feature 1", "Feature 2"]' class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Prerequisites (JSON array)</label>
                <input type="text" name="prerequisites" placeholder='["Prerequisite 1"]' class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Image</label>
                <input type="file" name="image" accept="image/*" class="w-full">
            </div>
            <div class="flex items-center gap-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" value="1" class="rounded">
                    <span class="ml-2 text-sm">Featured</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" checked class="rounded">
                    <span class="ml-2 text-sm">Active</span>
                </label>
            </div>
            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">Create Program</button>
        </form>
    </div>
</div>
@endsection
