@extends('layouts.admin')

@section('title', 'Support Tickets')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">Open Tickets</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $openCount }}</p>
            </div>
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">Resolved</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $resolvedCount }}</p>
            </div>
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">Urgent</p>
                <p class="text-2xl font-bold text-red-600 mt-1">{{ $urgentCount }}</p>
            </div>
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="text-left px-6 py-3 font-medium">#</th>
                    <th class="text-left px-6 py-3 font-medium">User</th>
                    <th class="text-left px-6 py-3 font-medium">Subject</th>
                    <th class="text-left px-6 py-3 font-medium">Priority</th>
                    <th class="text-left px-6 py-3 font-medium">Status</th>
                    <th class="text-left px-6 py-3 font-medium">Assigned To</th>
                    <th class="text-left px-6 py-3 font-medium">Created</th>
                    <th class="text-left px-6 py-3 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($tickets as $ticket)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-gray-500">{{ $ticket->id }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center text-xs font-bold text-red-600 mr-3">
                                {{ substr($ticket->user->name, 0, 1) }}
                            </div>
                            <span class="font-medium">{{ $ticket->user->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 max-w-[200px] truncate">{{ $ticket->subject }}</td>
                    <td class="px-6 py-4">
                        @php
                            $priorityClasses = [
                                'low' => 'bg-gray-100 text-gray-800',
                                'medium' => 'bg-blue-100 text-blue-800',
                                'high' => 'bg-orange-100 text-orange-800',
                                'urgent' => 'bg-red-100 text-red-800',
                            ];
                        @endphp
                        <span class="text-xs px-2 py-1 rounded-full {{ $priorityClasses[$ticket->priority] ?? 'bg-gray-100 text-gray-800' }}">
                            {{ ucfirst($ticket->priority) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $statusClasses = [
                                'open' => 'bg-green-100 text-green-800',
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'resolved' => 'bg-blue-100 text-blue-800',
                                'escalated' => 'bg-red-100 text-red-800',
                                'closed' => 'bg-gray-100 text-gray-800',
                            ];
                        @endphp
                        <span class="text-xs px-2 py-1 rounded-full {{ $statusClasses[$ticket->status] ?? 'bg-gray-100 text-gray-800' }}">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        {{ $ticket->assignee?->name ?? '—' }}
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $ticket->created_at->format('M j, Y') }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.support.show', $ticket) }}" class="text-red-600 hover:text-red-700 text-sm">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-gray-100">
        {{ $tickets->links() }}
    </div>
</div>
@endsection
