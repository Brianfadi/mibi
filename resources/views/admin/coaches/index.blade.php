@extends('layouts.admin')

@section('title', 'Coaches')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold">Coaches</h2>
    <a href="{{ route('admin.coaches.create') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">Add Coach</a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($coaches as $coach)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center text-lg font-bold text-red-600 flex-shrink-0">
                {{ substr($coach->name, 0, 1) }}
            </div>
            <div class="min-w-0">
                <h3 class="font-semibold truncate">{{ $coach->name }}</h3>
                <p class="text-sm text-gray-500 truncate">{{ $coach->email }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-3 mb-4">
            <div class="bg-gray-50 rounded-lg p-3 text-center">
                <p class="text-lg font-semibold text-gray-900">{{ $coach->sessions_completed ?? 0 }}</p>
                <p class="text-xs text-gray-500">Completed</p>
            </div>
            <div class="bg-gray-50 rounded-lg p-3 text-center">
                <p class="text-lg font-semibold text-gray-900">{{ $coach->upcoming_sessions ?? 0 }}</p>
                <p class="text-xs text-gray-500">Upcoming</p>
            </div>
        </div>

        <div class="flex items-center justify-between mb-4">
            <span class="text-xs px-2 py-1 rounded-full {{ $coach->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $coach->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

        <div class="flex gap-2">
            <a href="{{ route('admin.coaches.show', $coach) }}" class="flex-1 text-center border border-gray-200 text-gray-700 px-3 py-2 rounded-lg text-sm hover:bg-gray-50">View</a>
            <a href="{{ route('admin.coaches.edit', $coach) }}" class="flex-1 text-center bg-red-600 text-white px-3 py-2 rounded-lg text-sm hover:bg-red-700">Edit</a>
        </div>
    </div>
    @empty
    <div class="col-span-full bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
        <p class="text-gray-500">No coaches found.</p>
    </div>
    @endforelse
</div>

<div class="mt-6">
    {{ $coaches->links() }}
</div>
@endsection