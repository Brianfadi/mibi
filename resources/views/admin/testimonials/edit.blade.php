@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.testimonials.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back</a>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold mb-4">Edit Testimonial</h2>
        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium mb-1">Author Name *</label>
                <input type="text" name="author_name" value="{{ $testimonial->author_name }}" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Author Title</label>
                <input type="text" name="author_title" value="{{ $testimonial->author_title }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Content *</label>
                <textarea name="content" rows="4" required class="w-full px-4 py-2 border rounded-lg">{{ $testimonial->content }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Rating</label>
                    <select name="rating" class="w-full px-4 py-2 border rounded-lg">
                        <option value="">No rating</option>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $testimonial->rating === $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Service Type</label>
                    <input type="text" name="service_type" value="{{ $testimonial->service_type }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Video URL</label>
                <input type="url" name="video_url" value="{{ $testimonial->video_url }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div class="flex items-center gap-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" value="1" {{ $testimonial->is_featured ? 'checked' : '' }} class="rounded">
                    <span class="ml-2 text-sm">Featured</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="is_published" value="1" {{ $testimonial->is_published ? 'checked' : '' }} class="rounded">
                    <span class="ml-2 text-sm">Published</span>
                </label>
            </div>
            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">Update</button>
        </form>
    </div>
</div>
@endsection
