@extends('layouts.admin')

@section('title', 'New Page')

@section('breadcrumb')
    <span class="mx-2">/</span>
    <a href="{{ route('admin.pages.index') }}" class="hover:text-gray-600">Pages</a>
    <span class="mx-2">/</span>
    <span class="text-gray-600">New Page</span>
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
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-white">New Page</h2>
                <p class="text-gray-300 text-sm mt-1">Create a new static page for MIBI</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8">
        <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- Main -->
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-gray-900 uppercase tracking-wider mb-2">Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="Enter page title..." class="w-full px-5 py-3.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-lg font-medium placeholder-gray-400 @error('title') border-red-500 @enderror">
                    @error('title') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-900 uppercase tracking-wider mb-2">Content</label>
                    <textarea name="content" rows="20" placeholder="Write page content here..." class="w-full px-5 py-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent font-mono text-sm leading-relaxed placeholder-gray-400 @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                    @error('content') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Settings Grid -->
            <div class="grid lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                        <label class="flex items-center text-sm font-bold text-gray-900 uppercase tracking-wider mb-3">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                            Template
                        </label>
                        <select name="template" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 bg-white text-sm">
                            <option value="default">Default</option>
                            <option value="full-width">Full Width</option>
                            <option value="landing">Landing</option>
                        </select>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                        <label class="flex items-center text-sm font-bold text-gray-900 uppercase tracking-wider mb-3">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Featured Image
                        </label>
                        <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-red-300 transition-colors cursor-pointer" onclick="document.getElementById('featuredImage').click()">
                            <svg class="w-8 h-8 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <p class="text-sm text-gray-600 font-medium">Click to upload featured image</p>
                            <p class="text-xs text-gray-400 mt-1">JPG, PNG or WebP</p>
                            <input id="featuredImage" type="file" name="featured_image" accept="image/*" class="hidden" onchange="this.closest('.border-2').querySelector('p.font-medium').textContent = this.files[0]?.name || 'Click to upload featured image'">
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                        <label class="flex items-center text-sm font-bold text-gray-900 uppercase tracking-wider mb-3">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            SEO Meta
                        </label>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ old('meta_title') }}" maxlength="70" placeholder="SEO title (max 70 chars)..." class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-sm placeholder-gray-400">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Meta Description</label>
                                <input type="text" name="meta_description" value="{{ old('meta_description') }}" maxlength="160" placeholder="SEO description (max 160 chars)..." class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-sm placeholder-gray-400">
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                        <label class="flex items-center text-sm font-bold text-gray-900 uppercase tracking-wider mb-3">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                            Publishing
                        </label>
                        <label class="flex items-center p-3 bg-white rounded-xl border border-gray-100 cursor-pointer hover:border-green-300 transition-colors">
                            <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="w-4 h-4 text-green-600 focus:ring-green-500 rounded">
                            <span class="ml-3 text-sm font-medium text-gray-900">Published</span>
                            <span class="ml-auto text-xs text-gray-400">Page will be publicly accessible</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                <a href="{{ route('admin.pages.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">Cancel</a>
                <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-8 py-3 rounded-xl font-semibold text-sm transition-all hover:scale-105 shadow-lg shadow-red-600/20 flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span>Create Page</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection