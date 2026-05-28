@extends('layouts.admin')

@section('title', 'New Post')

@section('content')
<div class="max-w-4xl">
    <a href="{{ route('admin.blog.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back to Posts</a>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold mb-4">New Blog Post</h2>
        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Title *</label>
                <input type="text" name="title" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Excerpt</label>
                <textarea name="excerpt" rows="2" maxlength="500" class="w-full px-4 py-2 border rounded-lg"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Content *</label>
                <textarea name="content" rows="15" class="w-full px-4 py-2 border rounded-lg font-mono text-sm"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Categories</label>
                    <select name="categories[]" multiple class="w-full px-4 py-2 border rounded-lg">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Featured Image</label>
                    <input type="file" name="featured_image" accept="image/*" class="w-full">
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Meta Title</label>
                    <input type="text" name="meta_title" maxlength="70" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Meta Description</label>
                    <input type="text" name="meta_description" maxlength="160" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            <div class="flex items-center gap-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_published" value="1" class="rounded">
                    <span class="ml-2 text-sm">Publish immediately</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" value="1" class="rounded">
                    <span class="ml-2 text-sm">Feature this post</span>
                </label>
            </div>
            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">Create Post</button>
        </form>
    </div>
</div>
@endsection
