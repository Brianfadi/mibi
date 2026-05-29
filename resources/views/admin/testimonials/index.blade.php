@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
<div class="w-full space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-2xl p-6 lg:p-8 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center shadow-lg shadow-red-600/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Testimonials</h2>
                    <p class="text-gray-400 text-sm mt-0.5">Showcase what clients say about MIBI</p>
                </div>
            </div>
            <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white rounded-xl text-sm font-semibold transition-all hover:scale-105 shadow-lg shadow-red-600/20">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add Testimonial
            </a>
        </div>
    </div>

    <!-- Stats -->
    @php
        $publishedCount = $testimonials->where('is_published', true)->count();
        $featuredCount = $testimonials->where('is_featured', true)->count();
    @endphp
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-gray-900">{{ $testimonials->total() }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Total</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-green-600">{{ $publishedCount }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Published</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-yellow-600">{{ $featuredCount }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Featured</p>
        </div>
    </div>

    <!-- Testimonials Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 lg:gap-6">
        @forelse($testimonials as $t)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
            <div class="h-1.5 bg-gradient-to-r from-red-500 to-red-700"></div>
            <div class="p-6">
                <!-- Author -->
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-red-100 to-red-200 rounded-xl flex items-center justify-center flex-shrink-0">
                            <span class="text-sm font-bold text-red-700 uppercase">{{ substr($t->author_name, 0, 2) }}</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-sm">{{ $t->author_name }}</h3>
                            @if($t->author_title)
                            <p class="text-xs text-gray-500">{{ $t->author_title }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center gap-1.5">
                        @if($t->is_featured)
                        <span class="text-xs px-2 py-0.5 rounded-full bg-yellow-100 text-yellow-700 border border-yellow-200 font-medium">Featured</span>
                        @endif
                    </div>
                </div>

                <!-- Rating -->
                @if($t->rating)
                <div class="flex items-center gap-0.5 mb-2">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= $t->rating ? 'text-yellow-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                    @endfor
                </div>
                @endif

                <!-- Content -->
                <p class="text-sm text-gray-600 leading-relaxed line-clamp-3 mb-3">&ldquo;{{ $t->content }}&rdquo;</p>

                <!-- Service Type & Status -->
                <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                    <div class="flex items-center gap-2">
                        @if($t->service_type)
                        <span class="text-xs px-2 py-0.5 rounded-full bg-purple-100 text-purple-700 font-medium">{{ $t->service_type }}</span>
                        @endif
                        @if($t->video_url)
                        <span class="text-xs px-2 py-0.5 rounded-full bg-blue-100 text-blue-700 font-medium flex items-center">
                            <svg class="w-3 h-3 mr-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                            Video
                        </span>
                        @endif
                    </div>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium {{ $t->is_published ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-gray-100 text-gray-600 border border-gray-200' }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $t->is_published ? 'bg-green-500' : 'bg-gray-400' }} mr-1.5"></span>
                        {{ $t->is_published ? 'Published' : 'Draft' }}
                    </span>
                </div>

                <!-- Actions -->
                <div class="flex gap-2 mt-3">
                    <a href="{{ route('admin.testimonials.edit', $t) }}" class="flex-1 text-center border border-gray-200 text-gray-700 px-3 py-2 rounded-xl text-sm font-medium hover:bg-gray-50 hover:border-gray-300 transition-all flex items-center justify-center">
                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Edit
                    </a>
                    <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" onsubmit="return confirm('Delete this testimonial?')" class="flex-1">
                        @csrf @method('DELETE')
                        <button type="submit" class="w-full text-center border border-red-200 text-red-600 px-3 py-2 rounded-xl text-sm font-medium hover:bg-red-50 hover:border-red-300 transition-all flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-white rounded-2xl shadow-sm border border-gray-100 p-16 text-center">
            <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
            </div>
            <p class="text-gray-500 font-medium">No testimonials yet</p>
            <p class="text-gray-400 text-sm mt-1">Add your first client testimonial.</p>
            <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center mt-4 px-4 py-2 bg-red-600 text-white rounded-xl text-sm font-medium hover:bg-red-700 transition-all">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add Testimonial
            </a>
        </div>
        @endforelse
    </div>

    @if($testimonials->hasPages())
    <div class="mt-6">
        {{ $testimonials->links() }}
    </div>
    @endif
</div>
@endsection