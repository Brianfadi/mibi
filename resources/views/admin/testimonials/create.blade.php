@extends('layouts.admin')

@section('title', 'Add Testimonial')

@section('breadcrumb')
    <span class="mx-2">/</span>
    <a href="{{ route('admin.testimonials.index') }}" class="hover:text-gray-600">Testimonials</a>
    <span class="mx-2">/</span>
    <span class="text-gray-600">Add Testimonial</span>
@endsection

@section('content')
<div class="w-full">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-2xl p-8 mb-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="relative flex items-center space-x-4">
            <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center shadow-lg shadow-red-600/30">
                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 011-1h4a1 1 0 110 2H7a1 1 0 01-1-1z"/></svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-white">New Testimonial</h2>
                <p class="text-gray-300 text-sm mt-1">Add a client success story to MIBI</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Main Fields -->
            <div class="grid lg:grid-cols-2 gap-6">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-900 uppercase tracking-wider mb-2">Author Name *</label>
                        <input type="text" name="author_name" value="{{ old('author_name') }}" required placeholder="e.g. Sarah W." class="w-full px-5 py-3.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-base placeholder-gray-400 @error('author_name') border-red-500 @enderror">
                        @error('author_name') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-900 uppercase tracking-wider mb-2">Author Title</label>
                        <input type="text" name="author_title" value="{{ old('author_title') }}" placeholder="e.g. Healing Journey Graduate" class="w-full px-5 py-3.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-base placeholder-gray-400 @error('author_title') border-red-500 @enderror">
                        @error('author_title') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-900 uppercase tracking-wider mb-2">Content *</label>
                        <textarea name="content" rows="6" required placeholder="What did this client say about MIBI?" class="w-full px-5 py-3.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent resize-none leading-relaxed placeholder-gray-400 @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                        @error('content') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                        <label class="flex items-center text-sm font-bold text-gray-900 uppercase tracking-wider mb-3">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            Rating
                        </label>
                        <div class="flex gap-2">
                            @for($i = 1; $i <= 5; $i++)
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} class="hidden peer">
                                <div class="text-center p-3 rounded-xl border border-gray-200 bg-white peer-checked:border-yellow-400 peer-checked:bg-yellow-50 peer-checked:shadow-sm transition-all hover:border-yellow-300">
                                    <div class="text-lg mb-1">
                                        @for($j = 0; $j < $i; $j++)⭐@endfor
                                    </div>
                                    <span class="text-xs font-medium text-gray-600 peer-checked:text-yellow-700">{{ $i }}</span>
                                </div>
                            </label>
                            @endfor
                        </div>
                        <p class="text-xs text-gray-400 mt-2">Tap a star rating above</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                        <label class="flex items-center text-sm font-bold text-gray-900 uppercase tracking-wider mb-3">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Details
                        </label>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Service Type</label>
                                <input type="text" name="service_type" value="{{ old('service_type') }}" placeholder="e.g. Relationship Coaching" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-sm placeholder-gray-400">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Video URL (optional)</label>
                                <input type="url" name="video_url" value="{{ old('video_url') }}" placeholder="https://youtube.com/..." class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-sm placeholder-gray-400">
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                        <label class="flex items-center text-sm font-bold text-gray-900 uppercase tracking-wider mb-3">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                            Publishing
                        </label>
                        <div class="space-y-3">
                            <label class="flex items-center p-3 bg-white rounded-xl border border-gray-100 cursor-pointer hover:border-yellow-300 transition-colors">
                                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="w-4 h-4 text-yellow-500 focus:ring-yellow-500 rounded">
                                <span class="ml-3 text-sm font-medium text-gray-900">Featured testimonial</span>
                                <span class="ml-auto text-xs text-gray-400">Shown prominently on site</span>
                            </label>
                            <label class="flex items-center p-3 bg-white rounded-xl border border-gray-100 cursor-pointer hover:border-green-300 transition-colors">
                                <input type="checkbox" name="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }} class="w-4 h-4 text-green-600 focus:ring-green-500 rounded">
                                <span class="ml-3 text-sm font-medium text-gray-900">Published</span>
                                <span class="ml-auto text-xs text-gray-400">Visible to visitors</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                <a href="{{ route('admin.testimonials.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">Cancel</a>
                <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-8 py-3 rounded-xl font-semibold text-sm transition-all hover:scale-105 shadow-lg shadow-red-600/20 flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Save Testimonial</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection