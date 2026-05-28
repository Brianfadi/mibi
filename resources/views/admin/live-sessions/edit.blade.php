@extends('layouts.admin')

@section('title', 'Edit Live Session')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.live-sessions.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back</a>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold mb-4">Edit: {{ $liveSession->title }}</h2>
        <form action="{{ route('admin.live-sessions.update', $liveSession) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium mb-1">Title *</label>
                <input type="text" name="title" value="{{ $liveSession->title }}" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Description</label>
                <textarea name="description" rows="4" class="w-full px-4 py-2 border rounded-lg">{{ $liveSession->description }}</textarea>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Date *</label>
                    <input type="date" name="session_date" value="{{ $liveSession->session_date->format('Y-m-d') }}" required class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Start Time *</label>
                    <input type="time" name="start_time" value="{{ $liveSession->start_time }}" required class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">End Time</label>
                    <input type="time" name="end_time" value="{{ $liveSession->end_time }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Type</label>
                    <select name="session_type" class="w-full px-4 py-2 border rounded-lg">
                        <option value="live" {{ $liveSession->session_type === 'live' ? 'selected' : '' }}>Live</option>
                        <option value="webinar" {{ $liveSession->session_type === 'webinar' ? 'selected' : '' }}>Webinar</option>
                        <option value="workshop" {{ $liveSession->session_type === 'workshop' ? 'selected' : '' }}>Workshop</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Timezone</label>
                    <select name="timezone" class="w-full px-4 py-2 border rounded-lg">
                        <option value="Africa/Nairobi" {{ $liveSession->timezone === 'Africa/Nairobi' ? 'selected' : '' }}>Africa/Nairobi</option>
                        <option value="UTC" {{ $liveSession->timezone === 'UTC' ? 'selected' : '' }}>UTC</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Meeting Link</label>
                <input type="url" name="meeting_link" value="{{ $liveSession->meeting_link }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Max Participants</label>
                    <input type="number" name="max_participants" value="{{ $liveSession->max_participants }}" min="1" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Price</label>
                    <input type="number" name="price" step="0.01" min="0" value="{{ $liveSession->price }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mt-6 flex items-center">
                        <input type="checkbox" name="is_free" value="1" {{ $liveSession->is_free ? 'checked' : '' }} class="rounded">
                        <span class="ml-2 text-sm">Free</span>
                    </label>
                </div>
            </div>
            <div class="flex items-center">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ $liveSession->is_active ? 'checked' : '' }} class="rounded">
                    <span class="ml-2 text-sm">Active</span>
                </label>
            </div>
            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">Update Session</button>
        </form>
    </div>
</div>
@endsection
