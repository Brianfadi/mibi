@extends('layouts.app')

@section('title', 'Search Results: ' . $query . ' — MIBI Blog')
@section('meta_description', 'Search results for ' . $query)

@section('content')
<section class="bg-gradient-to-br from-black via-gray-900 to-red-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold mb-2">Search Results</h1>
        <p class="text-gray-300">Showing results for "{{ $query }}"</p>
    </div>
</section>

<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($posts->count() > 0)
            <div class="grid md:grid-cols-2 gap-6">
                @foreach($posts as $post)
                <a href="{{ route('blog.show', $post->slug) }}" class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-md transition group">
                    <div class="p-5">
                        <h3 class="font-semibold text-lg group-hover:text-red-600 transition">{{ $post->title }}</h3>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($post->excerpt, 150) }}</p>
                        <p class="text-xs text-gray-400 mt-3">{{ $post->published_at->format('M j, Y') }}</p>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="mt-8">{{ $posts->links() }}</div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">No results found for "{{ $query }}". Try different keywords.</p>
                <a href="{{ route('blog.index') }}" class="mt-4 inline-block text-red-600 hover:text-red-700">Browse all articles →</a>
            </div>
        @endif
    </div>
</section>
@endsection
