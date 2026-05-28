@extends('layouts.app')

@section('title', $category->name . ' — MIBI Blog')
@section('meta_description', 'Browse all articles in the ' . $category->name . ' category.')

@section('content')
<section class="bg-gradient-to-br from-black via-gray-900 to-red-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('blog.index') }}" class="text-gray-400 hover:text-white mb-4 inline-block">← Back to Blog</a>
        <h1 class="text-4xl font-bold">{{ $category->name }}</h1>
        @if($category->description)
            <p class="text-gray-300 mt-2">{{ $category->description }}</p>
        @endif
    </div>
</section>

<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                @if($posts->count() > 0)
                <div class="grid md:grid-cols-2 gap-6">
                    @foreach($posts as $post)
                    <a href="{{ route('blog.show', $post->slug) }}" class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-md transition group">
                        <div class="p-5">
                            <h3 class="font-semibold group-hover:text-red-600 transition">{{ $post->title }}</h3>
                            <p class="text-gray-600 text-sm mt-2">{{ Str::limit($post->excerpt, 120) }}</p>
                            <p class="text-xs text-gray-400 mt-3">{{ $post->published_at->format('M j, Y') }} · {{ $post->reading_time }} min</p>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="mt-8">{{ $posts->links() }}</div>
                @else
                <p class="text-gray-500">No posts in this category yet.</p>
                @endif
            </div>
            <div>
                <div class="bg-gray-50 rounded-xl p-5 sticky top-24">
                    <h3 class="font-semibold mb-3">Categories</h3>
                    <div class="space-y-2">
                        @foreach($categories as $cat)
                        <a href="{{ route('blog.category', $cat->slug) }}" class="block text-sm text-gray-600 hover:text-red-600 transition {{ $cat->id === $category->id ? 'text-red-600 font-semibold' : '' }}">
                            {{ $cat->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
