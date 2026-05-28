@extends('layouts.app')

@section('title', 'Blog — MIBI | Relationship Wisdom & Healing')
@section('meta_description', 'Explore MIBI blog for relationship advice, healing tips, emotional growth, and wisdom for healthier connections.')

@section('content')
<section class="bg-gradient-to-br from-black via-gray-900 to-red-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">MIBI Blog</h1>
        <p class="text-xl text-gray-300">Wisdom, healing, and guidance for your relationship journey</p>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                @if($featuredPost)
                <div class="mb-12">
                    <a href="{{ route('blog.show', $featuredPost->slug) }}" class="block bg-gray-50 rounded-xl overflow-hidden hover:shadow-md transition group">
                        <div class="md:flex">
                            <div class="md:w-2/5 bg-gray-200 h-48 md:h-auto flex items-center justify-center">
                                @if($featuredPost->featured_image)
                                    <img src="{{ asset('storage/' . $featuredPost->featured_image) }}" alt="" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                @endif
                            </div>
                            <div class="md:w-3/5 p-6">
                                <span class="text-xs text-red-600 font-semibold uppercase tracking-wider">Featured</span>
                                <h2 class="text-2xl font-bold mt-2 group-hover:text-red-600 transition">{{ $featuredPost->title }}</h2>
                                <p class="text-gray-600 mt-2">{{ $featuredPost->excerpt }}</p>
                                <div class="flex items-center mt-4 text-sm text-gray-500">
                                    <span>{{ $featuredPost->author->name }}</span>
                                    <span class="mx-2">·</span>
                                    <span>{{ $featuredPost->published_at->format('M j, Y') }}</span>
                                    <span class="mx-2">·</span>
                                    <span>{{ $featuredPost->reading_time }} min read</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif

                <div class="grid md:grid-cols-2 gap-6">
                    @foreach($posts as $post)
                    <a href="{{ route('blog.show', $post->slug) }}" class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-md transition group">
                        <div class="bg-gray-100 h-48 flex items-center justify-center">
                            @if($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="" class="w-full h-full object-cover">
                            @else
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            @endif
                        </div>
                        <div class="p-5">
                            <div class="flex flex-wrap gap-2 mb-2">
                                @foreach($post->categories as $category)
                                    <span class="text-xs bg-red-50 text-red-600 px-2 py-1 rounded-full">{{ $category->name }}</span>
                                @endforeach
                            </div>
                            <h3 class="font-semibold text-lg group-hover:text-red-600 transition mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-600 text-sm">{{ Str::limit($post->excerpt, 120) }}</p>
                            <div class="flex items-center mt-3 text-xs text-gray-400">
                                <span>{{ $post->published_at->format('M j, Y') }}</span>
                                <span class="mx-2">·</span>
                                <span>{{ $post->reading_time }} min read</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $posts->links() }}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    <!-- Search -->
                    <div class="bg-gray-50 rounded-xl p-5">
                        <h3 class="font-semibold mb-3">Search</h3>
                        <form action="{{ route('blog.search') }}" method="GET">
                            <input type="text" name="q" placeholder="Search articles..." class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500">
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="bg-gray-50 rounded-xl p-5">
                        <h3 class="font-semibold mb-3">Categories</h3>
                        <div class="space-y-2">
                            @foreach($categories as $category)
                            <a href="{{ route('blog.category', $category->slug) }}" class="flex justify-between items-center text-sm text-gray-600 hover:text-red-600 transition">
                                <span>{{ $category->name }}</span>
                                <span class="text-xs text-gray-400">({{ $category->posts_count ?? 0 }})</span>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Popular Posts -->
                    @if($popularPosts->isNotEmpty())
                    <div class="bg-gray-50 rounded-xl p-5">
                        <h3 class="font-semibold mb-3">Popular Posts</h3>
                        <div class="space-y-3">
                            @foreach($popularPosts as $popular)
                            <a href="{{ route('blog.show', $popular->slug) }}" class="block text-sm hover:text-red-600 transition">
                                <p class="font-medium">{{ $popular->title }}</p>
                                <p class="text-gray-400 text-xs">{{ $popular->published_at->format('M j, Y') }}</p>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
