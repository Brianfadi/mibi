@extends('layouts.admin')

@section('title', 'Edit Program')

@section('content')
<div class="w-full space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-2xl p-6 lg:p-8 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="relative flex items-center space-x-4">
            <a href="{{ route('admin.programs.index') }}" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center text-white border border-white/20 transition-all backdrop-blur-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <h2 class="text-2xl font-bold text-white">Edit Program</h2>
                <p class="text-gray-400 text-sm mt-0.5">{{ $program->title }}</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8">
        <form action="{{ route('admin.programs.update', $program) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ $program->title }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Short Description</label>
                    <input type="text" name="short_description" value="{{ $program->short_description }}" maxlength="300" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">Description</label>
                <textarea name="description" rows="5" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">{{ $program->description }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Price</label>
                    <input type="number" name="price" step="0.01" min="0" value="{{ $program->price }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Currency</label>
                    <select name="currency" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                        <option value="KES" {{ $program->currency === 'KES' ? 'selected' : '' }}>KES — Kenyan Shilling</option>
                        <option value="USD" {{ $program->currency === 'USD' ? 'selected' : '' }}>USD — US Dollar</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ $program->sort_order }}" min="0" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Duration Value</label>
                    <input type="number" name="duration_value" value="{{ $program->duration_value }}" min="1" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Duration Unit</label>
                    <select name="duration_unit" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                        <option value="weeks" {{ $program->duration_unit === 'weeks' ? 'selected' : '' }}>Weeks</option>
                        <option value="months" {{ $program->duration_unit === 'months' ? 'selected' : '' }}>Months</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Max Participants</label>
                    <input type="number" name="max_participants" value="{{ $program->max_participants }}" min="1" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Features <span class="text-xs text-gray-400 font-normal">(JSON array)</span></label>
                    <input type="text" name="features" value="{{ is_array($program->features) ? json_encode($program->features) : $program->features }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Prerequisites <span class="text-xs text-gray-400 font-normal">(JSON array)</span></label>
                    <input type="text" name="prerequisites" value="{{ is_array($program->prerequisites) ? json_encode($program->prerequisites) : $program->prerequisites }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all">
                </div>
            </div>

            @if($program->image)
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">Current Image</label>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('storage/' . $program->image) }}" class="w-20 h-14 rounded-xl object-cover border border-gray-200">
                    <span class="text-xs text-gray-400">To replace, upload a new image below</span>
                </div>
            </div>
            @endif

            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">{{ $program->image ? 'Replace Image' : 'Image' }}</label>
                <div class="flex items-center gap-4">
                    <label class="relative cursor-pointer">
                        <div class="flex items-center gap-2 px-4 py-2.5 border border-gray-200 rounded-xl hover:bg-gray-50 transition-all">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-sm text-gray-600">{{ $program->image ? 'Choose new image' : 'Choose image' }}</span>
                        </div>
                        <input type="file" name="image" accept="image/*" class="hidden">
                    </label>
                    <span class="text-xs text-gray-400">Recommended: 800×600, JPG or PNG</span>
                </div>
            </div>

            <div class="flex items-center gap-6">
                <label class="relative flex items-center cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ $program->is_featured ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-10 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-red-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-700">Featured</span>
                </label>
                <label class="relative flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ $program->is_active ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-10 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-red-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-700">Active</span>
                </label>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white rounded-xl text-sm font-medium transition-all shadow-lg shadow-red-600/30">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Update Program
                </button>
                <a href="{{ route('admin.programs.index') }}" class="px-6 py-2.5 text-gray-500 hover:text-gray-700 text-sm font-medium transition-all">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection