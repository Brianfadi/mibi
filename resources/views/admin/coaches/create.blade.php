@extends('layouts.admin')

@section('title', 'Add Coach')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.coaches.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back to Coaches</a>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold mb-4">Add Coach</h2>
        <form action="{{ route('admin.coaches.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Name *</label>
                <input type="text" name="name" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email *</label>
                <input type="email" name="email" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Phone</label>
                <input type="text" name="phone" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Password *</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Bio</label>
                <textarea name="bio" rows="4" class="w-full px-4 py-2 border rounded-lg"></textarea>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">Create Coach</button>
                <a href="{{ route('admin.coaches.index') }}" class="border border-gray-200 text-gray-700 px-6 py-2 rounded-lg text-sm hover:bg-gray-50">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection