@extends('layouts.admin')

@section('title', 'Media Library')

@php
function formatBytes($bytes, $precision = 2) {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
    return round($bytes / pow(1024, $pow), $precision) . ' ' . $units[$pow];
}
@endphp

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <p class="text-sm text-gray-500">Total Files</p>
        <p class="text-2xl font-bold text-gray-900">{{ number_format($totalFiles) }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <p class="text-sm text-gray-500">Total Size</p>
        <p class="text-2xl font-bold text-gray-900">{{ formatBytes($totalSize) }}</p>
    </div>
    <div class="md:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <p class="text-sm text-gray-500 mb-2">Files by Type</p>
        <div class="flex flex-wrap gap-2">
            @foreach($byType as $mime => $count)
            <span class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded-full">
                {{ $mime }}: {{ $count }}
            </span>
            @endforeach
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <h2 class="text-lg font-semibold mb-4">Upload File</h2>
    <form action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data" class="flex items-end gap-4">
        @csrf
        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700 mb-1">File *</label>
            <input type="file" name="file" required class="w-full px-4 py-2 border rounded-lg text-sm file:mr-3 file:py-1.5 file:px-3 file:border-0 file:rounded file:bg-red-50 file:text-red-700 file:text-sm file:font-medium hover:file:bg-red-100">
        </div>
        <div class="w-48">
            <label class="block text-sm font-medium text-gray-700 mb-1">Collection</label>
            <input type="text" name="collection" class="w-full px-4 py-2 border rounded-lg text-sm" placeholder="e.g. logos, banners">
        </div>
        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg text-sm hover:bg-red-700 transition whitespace-nowrap">Upload</button>
    </form>
</div>

<div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @forelse($media as $file)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group">
        <div class="h-36 bg-gray-50 flex items-center justify-center overflow-hidden">
            @if(str_starts_with($file->mime_type, 'image/'))
                <img src="{{ $file->url }}" alt="{{ $file->name }}" class="w-full h-full object-cover">
            @else
                <div class="text-center">
                    <svg class="w-10 h-10 text-gray-400 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    <span class="text-xs text-gray-500">{{ strtoupper(pathinfo($file->name, PATHINFO_EXTENSION)) }}</span>
                </div>
            @endif
        </div>
        <div class="p-3 space-y-1">
            <p class="text-sm font-medium text-gray-900 truncate" title="{{ $file->name }}">{{ $file->name }}</p>
            <p class="text-xs text-gray-500">{{ formatBytes($file->size) }}</p>
            <p class="text-xs text-gray-400">{{ $file->mime_type }}</p>
            @if($file->collection)
            <span class="inline-block text-xs bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded">{{ $file->collection }}</span>
            @endif
            <p class="text-xs text-gray-400">{{ $file->created_at->format('M j, Y') }}</p>
        </div>
        <div class="px-3 pb-3">
            <form action="{{ route('admin.media.destroy', $file) }}" method="POST" onsubmit="return confirm('Delete this file?')">
                @csrf @method('DELETE')
                <button type="submit" class="text-xs text-red-600 hover:text-red-700 font-medium">Delete</button>
            </form>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-12 text-gray-500">
        <p>No media files found.</p>
    </div>
    @endforelse
</div>

<div class="mt-6">
    {{ $media->links() }}
</div>
@endsection
