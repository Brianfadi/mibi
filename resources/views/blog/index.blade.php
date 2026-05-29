@extends('layouts.app')

@section('title', 'Blog — MIBI | Relationship Wisdom & Healing')
@section('meta_description', 'Explore MIBI blog for relationship advice, healing tips, emotional growth, and wisdom for healthier connections.')

@push('styles')
<style>
.text-gradient { background: linear-gradient(135deg,#fbbf24,#ef4444,#dc2626); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.reveal { opacity: 0; transition: all 1s cubic-bezier(0.16, 1, 0.3, 1); }
.reveal-left { transform: translateX(-60px); }
.reveal-right { transform: translateX(60px); }
.reveal-up { transform: translateY(50px); }
.reveal-scale { transform: scale(0.9); }
.reveal.revealed { opacity: 1; transform: translateX(0) translateY(0) scale(1); }
.stagger-1 { transition-delay: 0.1s; }
.stagger-2 { transition-delay: 0.2s; }
.stagger-3 { transition-delay: 0.3s; }
.stagger-4 { transition-delay: 0.4s; }
.stagger-5 { transition-delay: 0.5s; }
</style>
@endpush

@section('content')
<!-- Hero -->
<section class="relative bg-black text-white py-28 overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ asset('images/IMG-20260528-WA0017.jpg') }}" alt="" class="w-full h-full object-cover opacity-20">
    <div class="absolute inset-0 bg-gradient-to-br from-black/90 via-gray-900/80 to-red-900/80"></div>
  </div>
  <div class="absolute inset-0 opacity-30">
    <div class="absolute top-10 left-10 w-80 h-80 bg-red-600 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-red-800 rounded-full blur-3xl"></div>
  </div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal reveal-up">
    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-red-600/30">
      <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
    </div>
    <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">MIBI Blog</span>
    <h1 class="text-5xl md:text-7xl font-bold mt-4 mb-6 leading-tight">Wisdom for Your <span class="text-gradient">Healing Journey</span></h1>
    <p class="text-gray-400 text-xl max-w-3xl mx-auto leading-relaxed">Relationship advice, emotional healing tips, and personal growth insights from the MIBI community.</p>
  </div>
</section>

<!-- Stats Strip -->
<section class="relative bg-[#111111] border-y border-red-800/30 py-10">
  <div class="absolute inset-0 bg-gradient-to-r from-red-900/10 via-transparent to-red-900/10 pointer-events-none"></div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 reveal reveal-up">
      <div class="text-center stagger-1">
        <div class="text-3xl md:text-4xl font-bold text-white">{{ $totalPosts }}+</div>
        <p class="text-gray-400 text-sm mt-1 uppercase tracking-wider">Articles</p>
      </div>
      <div class="text-center stagger-2">
        <div class="text-3xl md:text-4xl font-bold text-red-400">{{ $totalCategories }}</div>
        <p class="text-gray-400 text-sm mt-1 uppercase tracking-wider">Categories</p>
      </div>
      <div class="text-center stagger-3">
        <div class="text-3xl md:text-4xl font-bold text-white">{{ $totalReadingTime }}+</div>
        <p class="text-gray-400 text-sm mt-1 uppercase tracking-wider">Minutes of Reading</p>
      </div>
      <div class="text-center stagger-4">
        <div class="text-3xl md:text-4xl font-bold text-red-400">{{ $posts->total() }}</div>
        <p class="text-gray-400 text-sm mt-1 uppercase tracking-wider">On This Page</p>
      </div>
    </div>
  </div>
</section>

<!-- Featured Post -->
@if($featuredPost)
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-14 reveal reveal-up">
      <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Featured Article</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-3">Must-<span class="text-gradient">Read</span></h2>
    </div>
    <div class="reveal reveal-up">
      <a href="{{ route('blog.show', $featuredPost->slug) }}" class="group block bg-white rounded-3xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-xl hover:border-red-200 transition-all duration-500">
        <div class="grid md:grid-cols-5">
          <div class="md:col-span-2 bg-gray-100 min-h-[280px] relative overflow-hidden">
            @if($featuredPost->featured_image)
            <img src="{{ asset('storage/' . $featuredPost->featured_image) }}" alt="" class="w-full h-full absolute inset-0 object-cover group-hover:scale-105 transition-transform duration-700">
            @else
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-red-50 via-red-100 to-gray-100">
              <svg class="w-20 h-20 text-red-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            </div>
            @endif
            <div class="absolute top-4 left-4">
              <span class="bg-red-600 text-white text-xs font-bold uppercase px-3 py-1.5 rounded-lg tracking-wider">Featured</span>
            </div>
          </div>
          <div class="md:col-span-3 p-8 md:p-10 flex flex-col justify-center">
            <div class="flex flex-wrap gap-2 mb-4">
              @foreach($featuredPost->categories as $category)
              <span class="text-xs bg-red-50 text-red-600 px-3 py-1 rounded-full font-medium">{{ $category->name }}</span>
              @endforeach
            </div>
            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 group-hover:text-red-600 transition-colors mb-4">{{ $featuredPost->title }}</h3>
            <p class="text-gray-600 leading-relaxed mb-6">{{ $featuredPost->excerpt }}</p>
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-4 text-sm text-gray-500">
                <div class="flex items-center space-x-2">
                  <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                    <span class="text-gray-500 font-bold text-xs">{{ substr($featuredPost->author->name ?? 'A', 0, 1) }}</span>
                  </div>
                  <span class="font-medium text-gray-700">{{ $featuredPost->author->name ?? 'MIBI' }}</span>
                </div>
                <span class="text-gray-300">|</span>
                <span>{{ $featuredPost->published_at->format('M j, Y') }}</span>
                <span class="text-gray-300">|</span>
                <span class="flex items-center space-x-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                  <span>{{ $featuredPost->reading_time }} min read</span>
                </span>
              </div>
              <span class="text-red-600 group-hover:translate-x-1 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
              </span>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</section>
@endif

<!-- All Posts -->
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-3 gap-10">
      <!-- Main Content -->
      <div class="lg:col-span-2">
        <div class="mb-10 reveal reveal-up">
          <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Latest Articles</span>
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-3">Recent <span class="text-gradient">Posts</span></h2>
        </div>

        <div class="space-y-8">
          @foreach($posts as $post)
          <article class="reveal reveal-up stagger-{{ min(($loop->iteration % 5) + 1, 5) }}">
            <a href="{{ route('blog.show', $post->slug) }}" class="group block bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-lg hover:border-red-200 transition-all duration-500">
              <div class="grid md:grid-cols-3">
                <div class="md:col-span-1 bg-gray-100 h-56 md:h-full min-h-[200px] relative overflow-hidden">
                  @if($post->featured_image)
                  <img src="{{ asset('storage/' . $post->featured_image) }}" alt="" class="w-full h-full absolute inset-0 object-cover group-hover:scale-105 transition-transform duration-700">
                  @else
                  <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                    <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                  </div>
                  @endif
                </div>
                <div class="md:col-span-2 p-6 md:p-8 flex flex-col justify-center">
                  <div class="flex flex-wrap gap-2 mb-3">
                    @foreach($post->categories as $category)
                    <span class="text-xs bg-red-50 text-red-600 px-2.5 py-1 rounded-full font-medium">{{ $category->name }}</span>
                    @endforeach
                  </div>
                  <h3 class="text-xl font-bold text-gray-900 group-hover:text-red-600 transition-colors mb-3">{{ $post->title }}</h3>
                  <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ Str::limit($post->excerpt, 150) }}</p>
                  <div class="flex items-center justify-between mt-auto">
                    <div class="flex items-center space-x-3 text-xs text-gray-400">
                      <div class="flex items-center space-x-1.5">
                        <div class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center">
                          <span class="text-gray-500 font-bold text-[10px]">{{ substr($post->author->name ?? 'A', 0, 1) }}</span>
                        </div>
                        <span class="text-gray-500 font-medium">{{ $post->author->name ?? 'MIBI' }}</span>
                      </div>
                      <span>·</span>
                      <span>{{ $post->published_at->format('M j, Y') }}</span>
                      <span>·</span>
                      <span class="flex items-center space-x-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        <span>{{ $post->reading_time }} min</span>
                      </span>
                    </div>
                    <span class="text-red-600 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </span>
                  </div>
                </div>
              </div>
            </a>
          </article>
          @endforeach
        </div>

        <div class="mt-12 reveal reveal-up">
          {{ $posts->links() }}
        </div>
      </div>

      <!-- Sidebar -->
      <div class="lg:col-span-1">
        <div class="sticky top-24 space-y-8">

          <!-- Search -->
          <div class="reveal reveal-right stagger-1 bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">
            <h3 class="font-bold text-gray-900 mb-4 flex items-center space-x-2">
              <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
              <span>Search</span>
            </h3>
            <form action="{{ route('blog.search') }}" method="GET">
              <div class="relative">
                <input type="text" name="q" placeholder="Search articles..." class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent text-sm">
                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
              </div>
            </form>
          </div>

          <!-- Categories -->
          <div class="reveal reveal-right stagger-2 bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">
            <h3 class="font-bold text-gray-900 mb-4 flex items-center space-x-2">
              <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
              <span>Categories</span>
            </h3>
            <div class="space-y-2">
              @foreach($categories as $category)
              <a href="{{ route('blog.category', $category->slug) }}" class="flex justify-between items-center px-4 py-2.5 rounded-xl text-sm transition-all duration-200 hover:bg-red-50 hover:text-red-600 group">
                <span class="text-gray-600 group-hover:text-red-600 transition-colors">{{ $category->name }}</span>
                <span class="text-xs bg-gray-100 text-gray-400 group-hover:bg-red-100 group-hover:text-red-600 px-2 py-0.5 rounded-full transition-colors">{{ $category->posts_count ?? $category->posts->count() }}</span>
              </a>
              @endforeach
            </div>
          </div>

          <!-- Popular Posts -->
          @if($popularPosts->isNotEmpty())
          <div class="reveal reveal-right stagger-3 bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">
            <h3 class="font-bold text-gray-900 mb-4 flex items-center space-x-2">
              <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
              <span>Popular</span>
            </h3>
            <div class="space-y-4">
              @foreach($popularPosts as $i => $popular)
              <a href="{{ route('blog.show', $popular->slug) }}" class="group flex items-start space-x-3">
                <span class="text-2xl font-bold text-gray-200 group-hover:text-red-200 transition-colors leading-none mt-0.5">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                <div class="flex-1 min-w-0">
                  <p class="text-sm font-medium text-gray-900 group-hover:text-red-600 transition-colors line-clamp-2">{{ $popular->title }}</p>
                  <p class="text-xs text-gray-400 mt-1">{{ $popular->published_at->format('M j, Y') }} · {{ $popular->reading_time }} min</p>
                </div>
              </a>
              @endforeach
            </div>
          </div>
          @endif

          <!-- CTA Widget -->
          <div class="reveal reveal-right stagger-4 bg-gradient-to-br from-red-600 to-red-800 rounded-2xl p-6 shadow-lg">
            <div class="text-white">
              <h3 class="font-bold text-lg mb-2">Start Healing Today</h3>
              <p class="text-red-100 text-sm mb-4">Join MIBI and begin your journey to emotional wellness and healthier relationships.</p>
              <a href="{{ route('register') }}" class="inline-flex items-center space-x-2 bg-white text-red-600 px-5 py-2.5 rounded-xl font-semibold text-sm hover:bg-red-50 transition-all">
                <span>Join Now</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- Newsletter -->
<section class="relative bg-black text-white py-20 overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ asset('images/IMG-20260528-WA0019.jpg') }}" alt="" class="w-full h-full object-cover opacity-15">
    <div class="absolute inset-0 bg-gradient-to-br from-red-900/80 via-gray-900/80 to-black/80"></div>
  </div>
  <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal reveal-up">
    <h2 class="text-3xl md:text-5xl font-bold mb-4">Stay <span class="text-gradient">Connected</span></h2>
    <p class="text-gray-300 text-lg mb-8">Get the latest articles, relationship tips, and healing insights delivered to your inbox.</p>
    <form class="flex flex-col sm:flex-row gap-3 max-w-lg mx-auto">
      <input type="email" placeholder="Enter your email address" class="flex-1 px-5 py-3.5 rounded-xl text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
      <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-8 py-3.5 rounded-xl font-semibold text-sm transition-all whitespace-nowrap">Subscribe</button>
    </form>
  </div>
</section>
@endsection

@push('scripts')
<script>
var revealObserver = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
        if (entry.isIntersecting) {
            entry.target.classList.add('revealed');
        }
    });
}, { threshold: 0.1 });
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.reveal').forEach(function(el) { revealObserver.observe(el); });
});
</script>
@endpush