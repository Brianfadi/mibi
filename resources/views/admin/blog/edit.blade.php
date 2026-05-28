@extends('layouts.admin')

@section('title', 'Edit Post')

@section('content')
<div class="max-w-4xl">
    <a href="{{ route('admin.blog.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back to Posts</a>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold mb-4">Edit: {{ $post->title }}</h2>
        <form action="{{ route('admin.blog.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium mb-1">Title *</label>
                <input type="text" name="title" value="{{ $post->title }}" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Excerpt</label>
                <textarea name="excerpt" rows="2" maxlength="500" class="w-full px-4 py-2 border rounded-lg">{{ $post->excerpt }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Content *</label>
                <textarea name="content" rows="15" class="w-full px-4 py-2 border rounded-lg font-mono text-sm">{{ $post->content }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Categories</label>
                    <select name="categories[]" multiple class="w-full px-4 py-2 border rounded-lg">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $post->categories->contains($cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Featured Image</label>
                    <input type="file" name="featured_image" accept="image/*" class="w-full">
                    @if($post->featured_image)
                        <p class="text-xs text-gray-500 mt-1">Current: {{ $post->featured_image }}</p>
                    @endif
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $post->meta_title }}" maxlength="70" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Meta Description</label>
                    <input type="text" name="meta_description" value="{{ $post->meta_description }}" maxlength="160" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="{{ $post->meta_keywords }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            <div class="flex items-center gap-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_published" value="1" {{ $post->is_published ? 'checked' : '' }} class="rounded">
                    <span class="ml-2 text-sm">Published</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" value="1" {{ $post->is_featured ? 'checked' : '' }} class="rounded">
                    <span class="ml-2 text-sm">Featured</span>
                </label>
            </div>
            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">Update Post</button>
        </form>
    </div>
</div>
@endsection
