@extends('layouts.admin')

@section('title', 'Live Sessions')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold">Live Sessions</h2>
    <a href="{{ route('admin.live-sessions.create') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">Create Session</a>
</div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left px-6 py-3 font-medium">Title</th>
                <th class="text-left px-6 py-3 font-medium">Date</th>
                <th class="text-left px-6 py-3 font-medium">Time</th>
                <th class="text-left px-6 py-3 font-medium">Type</th>
                <th class="text-left px-6 py-3 font-medium">Registered</th>
                <th class="text-left px-6 py-3 font-medium">Status</th>
                <th class="text-left px-6 py-3 font-medium">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($sessions as $session)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium">{{ $session->title }}</td>
                <td class="px-6 py-4">{{ $session->session_date->format('M j, Y') }}</td>
                <td class="px-6 py-4">{{ date('g:i A', strtotime($session->start_time)) }}</td>
                <td class="px-6 py-4 capitalize">{{ $session->session_type }}</td>
                <td class="px-6 py-4">{{ $session->participants_count }}/{{ $session->max_participants ?? '∞' }}</td>
                <td class="px-6 py-4">
                    <span class="text-xs px-2 py-1 rounded-full {{ $session->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $session->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.live-sessions.edit', $session) }}" class="text-red-600 hover:text-red-700">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $sessions->links() }}</div>
@endsection
