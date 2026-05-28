@extends('layouts.app')

@section('title', $post->title . ' — MIBI Blog')
@section('meta_description', $post->meta_description ?? $post->excerpt)

@section('content')
<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('blog.index') }}" class="inline-flex items-center text-gray-600 hover:text-red-600 mb-6 transition">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Blog
        </a>

        <article>
            <div class="mb-8">
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach($post->categories as $category)
                        <span class="text-xs bg-red-50 text-red-600 px-3 py-1 rounded-full">{{ $category->name }}</span>
                    @endforeach
                </div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
                <div class="flex items-center text-sm text-gray-500">
                    <span>{{ $post->author->name }}</span>
                    <span class="mx-2">·</span>
                    <span>{{ $post->published_at->format('F j, Y') }}</span>
                    <span class="mx-2">·</span>
                    <span>{{ $post->reading_time }} min read</span>
                </div>
            </div>

            @if($post->featured_image)
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->featured_image_caption ?? $post->title }}"
                 class="w-full rounded-xl mb-8">
            @endif

            <div class="prose prose-lg max-w-none prose-red">
                {!! $post->content !!}
            </div>
        </article>

        <!-- Share -->
        <div class="mt-8 pt-8 border-t border-gray-200">
            <h3 class="font-semibold mb-3">Share this article</h3>
            <div class="flex space-x-3">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="bg-gray-100 hover:bg-blue-100 text-gray-600 hover:text-blue-600 px-4 py-2 rounded-lg text-sm transition">Facebook</a>
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="bg-gray-100 hover:bg-blue-100 text-gray-600 hover:text-blue-600 px-4 py-2 rounded-lg text-sm transition">X (Twitter)</a>
                <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="bg-gray-100 hover:bg-green-100 text-gray-600 hover:text-green-600 px-4 py-2 rounded-lg text-sm transition">WhatsApp</a>
            </div>
        </div>
    </div>
</section>

<!-- Related Posts -->
@if($relatedPosts->isNotEmpty())
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Articles</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($relatedPosts as $related)
            <a href="{{ route('blog.show', $related->slug) }}" class="bg-white rounded-xl overflow-hidden border border-gray-200 hover:shadow-md transition group">
                <div class="bg-gray-100 h-40 flex items-center justify-center">
                    @if($related->featured_image)
                        <img src="{{ asset('storage/' . $related->featured_image) }}" alt="" class="w-full h-full object-cover">
                    @else
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="font-semibold group-hover:text-red-600 transition">{{ $related->title }}</h3>
                    <p class="text-sm text-gray-500 mt-1">{{ $related->published_at->format('M j, Y') }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Newsletter CTA -->
<section class="py-12 bg-black text-white">
    <div class="max-w-2xl mx-auto px-4 text-center">
        <h2 class="text-2xl font-bold mb-2">Get Weekly Relationship Wisdom</h2>
        <p class="text-gray-400 mb-6">Subscribe to receive healing tips and advice in your inbox.</p>
        <form action="{{ route('subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
            @csrf
            <input type="email" name="email" required placeholder="Your email" class="flex-1 px-4 py-3 rounded-lg text-gray-900">
            <button type="submit" class="bg-red-600 hover:bg-red-700 px-6 py-3 rounded-lg font-semibold">Subscribe</button>
        </form>
    </div>
</section>
@endsection
