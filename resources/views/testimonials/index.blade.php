@extends('layouts.app')

@section('title', 'Testimonials — MIBI Healing Stories')
@section('meta_description', 'Read real healing stories and testimonials from the MIBI community.')

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
.t-card:hover .t-overlay { opacity: 1; }
.filter-active { --tw-bg-opacity: 1; background-color: rgb(220 38 38 / var(--tw-bg-opacity)); --tw-text-opacity: 1; color: rgb(255 255 255 / var(--tw-text-opacity)); }
</style>
@endpush

@section('content')
<!-- Hero -->
<section class="relative bg-black text-white py-28 overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ asset('images/IMG-20260528-WA0016.jpg') }}" alt="" class="w-full h-full object-cover opacity-20">
    <div class="absolute inset-0 bg-gradient-to-br from-black/90 via-gray-900/80 to-red-900/80"></div>
  </div>
  <div class="absolute inset-0 opacity-30">
    <div class="absolute top-10 left-10 w-80 h-80 bg-red-600 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-red-800 rounded-full blur-3xl"></div>
  </div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal reveal-up">
    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-red-600/30">
      <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M9.983 3v7.391c0 5.704-3.731 9.57-8.983 10.609l-.995-2.151c2.432-.917 3.995-3.638 3.995-5.849h-4v-10h9.983zm14.017 0v7.391c0 5.704-3.748 9.571-9 10.609l-.996-2.151c2.433-.917 3.996-3.638 3.996-5.849h-3.983v-10h9.983z"/></svg>
    </div>
    <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">Real Stories, Real Healing</span>
    <h1 class="text-5xl md:text-7xl font-bold mt-4 mb-6 leading-tight">What Our <span class="text-gradient">Community</span> Says</h1>
    <p class="text-gray-400 text-xl max-w-3xl mx-auto leading-relaxed">Every story is a testament to the power of healing, growth, and transformation.</p>
  </div>
</section>

<!-- Stats Strip -->
<section class="relative bg-[#111111] border-y border-red-800/30 py-10">
  <div class="absolute inset-0 bg-gradient-to-r from-red-900/10 via-transparent to-red-900/10 pointer-events-none"></div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 reveal reveal-up">
      <div class="text-center stagger-1">
        <div class="text-3xl md:text-4xl font-bold text-white">{{ $totalTestimonials }}+</div>
        <p class="text-gray-400 text-sm mt-1 uppercase tracking-wider">Healing Stories</p>
      </div>
      <div class="text-center stagger-2">
        <div class="text-3xl md:text-4xl font-bold text-red-400">{{ $avgRating ? number_format($avgRating, 1) : '5.0' }}</div>
        <p class="text-gray-400 text-sm mt-1 uppercase tracking-wider">Avg Rating</p>
      </div>
      <div class="text-center stagger-3">
        <div class="text-3xl md:text-4xl font-bold text-white">{{ $serviceTypes->count() }}</div>
        <p class="text-gray-400 text-sm mt-1 uppercase tracking-wider">Program Types</p>
      </div>
      <div class="text-center stagger-4">
        <div class="text-3xl md:text-4xl font-bold text-red-400">{{ $featuredTestimonials->count() }}</div>
        <p class="text-gray-400 text-sm mt-1 uppercase tracking-wider">Featured Stories</p>
      </div>
    </div>
  </div>
</section>

@if($featuredTestimonials->isNotEmpty())
<!-- Featured Testimonials -->
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-14 reveal reveal-up">
      <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Featured Stories</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-3">Journeys of <span class="text-gradient">Transformation</span></h2>
      <p class="text-gray-500 mt-3 max-w-2xl mx-auto">These are just a few of the incredible transformations happening in the MIBI community every day.</p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($featuredTestimonials as $testimonial)
      <div class="reveal reveal-up stagger-{{ min($loop->iteration, 5) }} group">
        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-xl hover:border-red-200 transition-all duration-500 h-full flex flex-col">
          @if($testimonial->author_avatar)
          <div class="h-48 overflow-hidden">
            <img src="{{ asset('storage/' . $testimonial->author_avatar) }}" alt="" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
          </div>
          @else
          <div class="h-48 bg-gradient-to-br from-red-50 via-red-100 to-red-200 flex items-center justify-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-20">
              <div class="absolute top-0 right-0 w-32 h-32 bg-red-600 rounded-full blur-3xl"></div>
              <div class="absolute bottom-0 left-0 w-24 h-24 bg-red-800 rounded-full blur-3xl"></div>
            </div>
            <div class="w-20 h-20 bg-white/80 backdrop-blur rounded-full flex items-center justify-center shadow-lg">
              <span class="text-red-600 font-bold text-3xl">{{ substr($testimonial->author_name, 0, 1) }}</span>
            </div>
          </div>
          @endif
          <div class="p-6 flex-1 flex flex-col">
            <div class="flex items-center justify-between mb-4">
              <div class="flex items-center space-x-3">
                @if($testimonial->author_avatar)
                <img src="{{ asset('storage/' . $testimonial->author_avatar) }}" alt="" class="w-10 h-10 rounded-full object-cover">
                @else
                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                  <span class="text-red-600 font-bold text-sm">{{ substr($testimonial->author_name, 0, 1) }}</span>
                </div>
                @endif
                <div>
                  <p class="font-semibold text-gray-900 text-sm">{{ $testimonial->author_name }}</p>
                  @if($testimonial->author_title)
                  <p class="text-gray-400 text-xs">{{ $testimonial->author_title }}</p>
                  @endif
                </div>
              </div>
              @if($testimonial->video_url)
              <span class="flex items-center space-x-1 text-xs text-red-500 bg-red-50 px-2.5 py-1 rounded-full font-medium">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                <span>Video</span>
              </span>
              @endif
            </div>
            <div class="flex-1">
              <p class="text-gray-600 leading-relaxed text-sm italic">"{{ $testimonial->content }}"</p>
            </div>
            <div class="mt-5 pt-4 border-t border-gray-100 flex items-center justify-between">
              <div class="flex items-center space-x-2">
                @if($testimonial->rating)
                <div class="flex text-red-500 text-sm">
                  @for($i = 0; $i < min($testimonial->rating, 5); $i++) ★ @endfor
                  @for($i = $testimonial->rating; $i < 5; $i++) ☆ @endfor
                </div>
                <span class="text-gray-400 text-xs">{{ $testimonial->rating }}/5</span>
                @endif
              </div>
              @if($testimonial->service_type)
              <span class="text-[10px] uppercase tracking-wider text-red-500 bg-red-50 px-2.5 py-1 rounded-full font-semibold">{{ $testimonial->service_type }}</span>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- All Testimonials -->
<section class="py-20 bg-gray-50" id="all-testimonials">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-14 reveal reveal-up">
      <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Community Voices</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-3">All <span class="text-gradient">Testimonials</span></h2>
      <p class="text-gray-500 mt-3 max-w-2xl mx-auto">Browse through stories from people who have walked the path of healing with MIBI.</p>
    </div>

    <div class="text-center mb-10 reveal reveal-up">
      <div class="flex flex-wrap justify-center gap-3" id="filter-buttons">
        <button class="filter-btn px-5 py-2.5 rounded-xl text-sm font-medium transition-all duration-300 filter-active" data-filter="all">All Stories</button>
        @foreach($serviceTypes as $type)
        <button class="filter-btn px-5 py-2.5 rounded-xl text-sm font-medium transition-all duration-300 bg-white text-gray-600 border border-gray-200 hover:border-red-300 hover:text-red-600" data-filter="{{ Str::slug($type) }}">{{ $type }}</button>
        @endforeach
      </div>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="testimonials-grid">
      @foreach($testimonials as $testimonial)
      <div class="testimonial-card reveal reveal-up stagger-{{ min(($loop->iteration % 5) + 1, 5) }}" data-service="{{ $testimonial->service_type ? Str::slug($testimonial->service_type) : 'other' }}">
        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-lg hover:border-red-200 transition-all duration-500 h-full flex flex-col group">
          @if($testimonial->author_avatar)
          <div class="h-40 overflow-hidden">
            <img src="{{ asset('storage/' . $testimonial->author_avatar) }}" alt="" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
          </div>
          @else
          <div class="h-40 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center relative overflow-hidden">
            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow">
              <span class="text-gray-500 font-bold text-2xl">{{ substr($testimonial->author_name, 0, 1) }}</span>
            </div>
          </div>
          @endif
          <div class="p-5 flex-1 flex flex-col">
            <div class="flex items-center space-x-3 mb-3">
              @if($testimonial->author_avatar)
              <img src="{{ asset('storage/' . $testimonial->author_avatar) }}" alt="" class="w-8 h-8 rounded-full object-cover">
              @else
              <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                <span class="text-gray-600 font-bold text-xs">{{ substr($testimonial->author_name, 0, 1) }}</span>
              </div>
              @endif
              <div>
                <p class="font-semibold text-gray-900 text-sm">{{ $testimonial->author_name }}</p>
                @if($testimonial->author_title)
                <p class="text-gray-400 text-xs">{{ $testimonial->author_title }}</p>
                @endif
              </div>
              @if($testimonial->video_url)
              <div class="ml-auto">
                <a href="{{ $testimonial->video_url }}" target="_blank" class="w-8 h-8 bg-red-50 hover:bg-red-100 rounded-full flex items-center justify-center transition">
                  <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                </a>
              </div>
              @endif
            </div>
            <p class="text-gray-600 text-sm leading-relaxed flex-1 italic">"{{ $testimonial->content }}"</p>
            <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between">
              <div class="flex items-center space-x-1">
                @if($testimonial->rating)
                @for($i = 0; $i < min($testimonial->rating, 5); $i++)
                <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                @endfor
                @endif
              </div>
              @if($testimonial->service_type)
              <span class="text-[10px] uppercase tracking-wider text-red-500 bg-red-50 px-2.5 py-1 rounded-full font-semibold">{{ $testimonial->service_type }}</span>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="mt-12 reveal reveal-up">
      {{ $testimonials->links() }}
    </div>
  </div>
</section>

<!-- CTA -->
<section class="relative bg-black text-white py-20 overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ asset('images/IMG-20260528-WA0015.jpg') }}" alt="" class="w-full h-full object-cover opacity-15">
    <div class="absolute inset-0 bg-gradient-to-br from-red-900/80 via-gray-900/80 to-black/80"></div>
  </div>
  <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal reveal-up">
    <h2 class="text-3xl md:text-5xl font-bold mb-4">Ready to Write Your <span class="text-gradient">Healing Story</span>?</h2>
    <p class="text-gray-300 text-lg mb-8">Your journey to emotional wellness and personal growth starts today. Join MIBI and begin your transformation.</p>
    <a href="{{ route('register') }}" class="inline-flex items-center space-x-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-10 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg shadow-red-600/30 hover:scale-105">
      <span>Begin Your Journey</span>
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
    </a>
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

    var filterButtons = document.querySelectorAll('.filter-btn');
    var cards = document.querySelectorAll('.testimonial-card');
    filterButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            filterButtons.forEach(function(b) { b.classList.remove('filter-active'); b.classList.remove('bg-red-600', 'text-white'); b.classList.add('bg-white', 'text-gray-600', 'border', 'border-gray-200'); });
            this.classList.add('filter-active');
            this.classList.remove('bg-white', 'text-gray-600', 'border', 'border-gray-200');
            var filter = this.getAttribute('data-filter');
            cards.forEach(function(card) {
                if (filter === 'all' || card.getAttribute('data-service') === filter) {
                    card.style.display = '';
                    setTimeout(function() { card.classList.add('revealed'); }, 50);
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endpush