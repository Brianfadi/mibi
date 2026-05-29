@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
<div class="w-full space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-2xl p-6 lg:p-8 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="relative flex items-center space-x-4">
            <a href="{{ route('admin.services.index') }}" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center text-white border border-white/20 transition-all backdrop-blur-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <h2 class="text-2xl font-bold text-white">Edit Service</h2>
                <p class="text-gray-400 text-sm mt-0.5">{{ $service->title }}</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ $service->title }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Short Description</label>
                    <input type="text" name="short_description" value="{{ $service->short_description }}" maxlength="300" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">Description</label>
                <textarea name="description" rows="5" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">{{ $service->description }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Price</label>
                    <input type="number" name="price" step="0.01" min="0" value="{{ $service->price }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Currency</label>
                    <select name="currency" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                        <option value="KES" {{ $service->currency === 'KES' ? 'selected' : '' }}>KES — Kenyan Shilling</option>
                        <option value="USD" {{ $service->currency === 'USD' ? 'selected' : '' }}>USD — US Dollar</option>
                        <option value="EUR" {{ $service->currency === 'EUR' ? 'selected' : '' }}>EUR — Euro</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Duration <span class="text-xs text-gray-400 font-normal">(minutes)</span></label>
                    <input type="number" name="duration_minutes" min="15" step="15" value="{{ $service->duration_minutes }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Session Type</label>
                    <select name="session_type" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                        <option value="individual" {{ $service->session_type === 'individual' ? 'selected' : '' }}>Individual</option>
                        <option value="couples" {{ $service->session_type === 'couples' ? 'selected' : '' }}>Couples</option>
                        <option value="group" {{ $service->session_type === 'group' ? 'selected' : '' }}>Group</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ $service->sort_order }}" min="0" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">Highlights <span class="text-xs text-gray-400 font-normal">(JSON array)</span></label>
                <input type="text" name="highlights" value="{{ is_array($service->highlights) ? json_encode($service->highlights) : $service->highlights }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
            </div>

            @if($service->icon)
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">Current Icon</label>
                <img src="{{ asset('storage/' . $service->icon) }}" class="w-14 h-14 rounded-xl object-cover border border-gray-200">
            </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">{{ $service->icon ? 'Replace Icon' : 'Icon' }}</label>
                    <label class="relative cursor-pointer block">
                        <div class="flex items-center gap-2 px-4 py-2.5 border border-gray-200 rounded-xl hover:bg-gray-50 transition-all">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-sm text-gray-600">{{ $service->icon ? 'Choose new icon' : 'Choose icon' }}</span>
                        </div>
                        <input type="file" name="icon" accept="image/*" class="hidden">
                    </label>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">{{ $service->image ? 'Replace Image' : 'Image' }}</label>
                    <label class="relative cursor-pointer block">
                        <div class="flex items-center gap-2 px-4 py-2.5 border border-gray-200 rounded-xl hover:bg-gray-50 transition-all">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-sm text-gray-600">{{ $service->image ? 'Choose new image' : 'Choose image' }}</span>
                        </div>
                        <input type="file" name="image" accept="image/*" class="hidden">
                    </label>
                </div>
            </div>

            @if($service->image)
            <div class="space-y-1">
                <label class="block text-sm font-semibold text-gray-700">Current Image</label>
                <img src="{{ asset('storage/' . $service->image) }}" class="w-40 h-28 rounded-xl object-cover border border-gray-200">
            </div>
            @endif

            <div class="relative flex items-center cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ $service->is_active ? 'checked' : '' }} class="sr-only peer">
                <div class="w-10 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-red-600"></div>
                <span class="ml-3 text-sm font-medium text-gray-700">Active</span>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white rounded-xl text-sm font-medium transition-all shadow-lg shadow-red-600/30">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Update Service
                </button>
                <a href="{{ route('admin.services.index') }}" class="px-6 py-2.5 text-gray-500 hover:text-gray-700 text-sm font-medium transition-all">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection