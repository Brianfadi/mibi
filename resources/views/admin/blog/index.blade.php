@extends('layouts.admin')

@section('title', 'Blog Posts')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold">All Posts</h2>
    <div class="flex gap-2">
        <a href="{{ route('admin.blog.categories') }}" class="border px-4 py-2 rounded-lg text-sm hover:bg-gray-50">Categories</a>
        <a href="{{ route('admin.blog.create') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">New Post</a>
    </div>
</div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left px-6 py-3 font-medium">Title</th>
                <th class="text-left px-6 py-3 font-medium">Author</th>
                <th class="text-left px-6 py-3 font-medium">Categories</th>
                <th class="text-left px-6 py-3 font-medium">Status</th>
                <th class="text-left px-6 py-3 font-medium">Date</th>
                <th class="text-left px-6 py-3 font-medium">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($posts as $post)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium max-w-xs truncate">{{ $post->title }}</td>
                <td class="px-6 py-4">{{ $post->author->name }}</td>
                <td class="px-6 py-4">
                    @foreach($post->categories as $cat)
                        <span class="text-xs bg-gray-100 px-2 py-1 rounded">{{ $cat->name }}</span>
                    @endforeach
                </td>
                <td class="px-6 py-4">
                    @if($post->is_published)
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">Published</span>
                    @else
                        <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">Draft</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-gray-600">{{ $post->published_at?->format('M j, Y') ?? '—' }}</td>
                <td class="px-6 py-4 space-x-2">
                    <a href="{{ route('admin.blog.edit', $post) }}" class="text-red-600 hover:text-red-700">Edit</a>
                    @if($post->is_published)
                        <form action="{{ route('admin.blog.unpublish', $post) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-yellow-600 hover:text-yellow-700">Unpublish</button>
                        </form>
                    @else
                        <form action="{{ route('admin.blog.publish', $post) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-green-600 hover:text-green-700">Publish</button>
                        </form>
                    @endif
                    <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Delete this post?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-700">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $posts->links() }}</div>
@endsection
