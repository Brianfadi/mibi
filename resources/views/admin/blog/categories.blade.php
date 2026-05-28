@extends('layouts.admin')

@section('title', 'Blog Categories')

@section('content')
<div class="grid md:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold mb-4">Add Category</h2>
        <form action="{{ route('admin.blog.categories.store') }}" method="POST" class="space-y-3">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Name *</label>
                <input type="text" name="name" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Description</label>
                <input type="text" name="description" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Color (hex)</label>
                <input type="text" name="color" placeholder="#e53e3e" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">Add Category</button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold mb-4">Existing Categories</h2>
        <div class="space-y-2">
            @foreach($categories as $cat)
            <div class="flex justify-between items-center py-2 border-b border-gray-50">
                <div class="flex items-center gap-2">
                    @if($cat->color)
                        <span class="w-3 h-3 rounded-full" style="background: {{ $cat->color }}"></span>
                    @endif
                    <span>{{ $cat->name }}</span>
                    <span class="text-xs text-gray-400">({{ $cat->posts_count }} posts)</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
