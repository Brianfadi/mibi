@extends('layouts.admin')

@section('title', 'Edit Page')

@section('content')
<div class="max-w-4xl">
    <a href="{{ route('admin.pages.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back</a>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold mb-4">Edit: {{ $page->title }}</h2>
        <form action="{{ route('admin.pages.update', $page) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium mb-1">Title *</label>
                <input type="text" name="title" value="{{ $page->title }}" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Content</label>
                <textarea name="content" rows="15" class="w-full px-4 py-2 border rounded-lg font-mono text-sm">{{ $page->content }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Template</label>
                    <select name="template" class="w-full px-4 py-2 border rounded-lg">
                        <option value="default" {{ $page->template === 'default' ? 'selected' : '' }}>Default</option>
                        <option value="full-width" {{ $page->template === 'full-width' ? 'selected' : '' }}>Full Width</option>
                        <option value="landing" {{ $page->template === 'landing' ? 'selected' : '' }}>Landing</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Featured Image</label>
                    <input type="file" name="featured_image" accept="image/*" class="w-full">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $page->meta_title }}" maxlength="70" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Meta Description</label>
                    <input type="text" name="meta_description" value="{{ $page->meta_description }}" maxlength="160" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            <label class="flex items-center">
                <input type="checkbox" name="is_published" value="1" {{ $page->is_published ? 'checked' : '' }} class="rounded">
                <span class="ml-2 text-sm">Published</span>
            </label>
            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">Update Page</button>
        </form>
    </div>
</div>
@endsection
