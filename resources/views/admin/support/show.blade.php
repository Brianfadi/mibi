@extends('layouts.admin')

@section('title', "Ticket #{$ticket->id}")

@php
    $priorityClasses = [
        'low' => 'bg-gray-100 text-gray-800',
        'medium' => 'bg-blue-100 text-blue-800',
        'high' => 'bg-orange-100 text-orange-800',
        'urgent' => 'bg-red-100 text-red-800',
    ];
    $statusClasses = [
        'open' => 'bg-green-100 text-green-800',
        'pending' => 'bg-yellow-100 text-yellow-800',
        'resolved' => 'bg-blue-100 text-blue-800',
        'escalated' => 'bg-red-100 text-red-800',
        'closed' => 'bg-gray-100 text-gray-800',
    ];
@endphp

@section('content')
<div class="max-w-4xl">
    <a href="{{ route('admin.support.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back to Tickets</a>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="flex items-start justify-between mb-4">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">{{ $ticket->subject }}</h2>
                <p class="text-xs text-gray-400 mt-1">Ticket #{{ $ticket->id }}</p>
            </div>
            <div class="flex items-center space-x-2">
                <span class="text-xs px-2 py-1 rounded-full {{ $priorityClasses[$ticket->priority] ?? 'bg-gray-100 text-gray-800' }}">
                    {{ ucfirst($ticket->priority) }}
                </span>
                <span class="text-xs px-2 py-1 rounded-full {{ $statusClasses[$ticket->status] ?? 'bg-gray-100 text-gray-800' }}">
                    {{ ucfirst($ticket->status) }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
            <div>
                <p class="text-gray-500 text-xs font-medium uppercase tracking-wider">User</p>
                <div class="flex items-center mt-1">
                    <div class="w-7 h-7 bg-red-100 rounded-full flex items-center justify-center text-xs font-bold text-red-600 mr-2">
                        {{ substr($ticket->user->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">{{ $ticket->user->name }}</p>
                        <p class="text-gray-500 text-xs">{{ $ticket->user->email }}</p>
                    </div>
                </div>
            </div>
            <div>
                <p class="text-gray-500 text-xs font-medium uppercase tracking-wider">Created</p>
                <p class="font-medium text-gray-900 mt-1">{{ $ticket->created_at->format('F j, Y g:i A') }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-xs font-medium uppercase tracking-wider">Assigned To</p>
                <p class="font-medium text-gray-900 mt-1">{{ $ticket->assignee?->name ?? 'Unassigned' }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <h3 class="text-sm font-semibold text-gray-900 mb-4">Conversation</h3>
        <div class="space-y-4">
            @foreach($ticket->messages as $message)
            <div class="flex {{ $message->user_id !== $ticket->user_id ? 'justify-end' : '' }}">
                <div class="flex items-start space-x-3 {{ $message->user_id !== $ticket->user_id ? 'flex-row-reverse space-x-reverse' : '' }} max-w-[80%]">
                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center text-xs font-bold text-red-600 flex-shrink-0">
                        {{ substr($message->user->name, 0, 1) }}
                    </div>
                    <div class="{{ $message->user_id !== $ticket->user_id ? 'bg-blue-50 border border-blue-100' : 'bg-gray-50 border border-gray-100' }} rounded-lg px-4 py-3">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm font-medium text-gray-900">{{ $message->user->name }}</span>
                            <span class="text-xs text-gray-400 ml-3">{{ $message->created_at->format('M j, Y g:i A') }}</span>
                        </div>
                        <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $message->message }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @if($ticket->status !== 'resolved' && $ticket->status !== 'closed')
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <h3 class="text-sm font-semibold text-gray-900 mb-4">Reply</h3>
        <form action="{{ route('admin.support.reply', $ticket) }}" method="POST">
            @csrf
            <textarea name="message" rows="4" class="w-full border border-gray-200 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-gray-400" placeholder="Write your reply..."></textarea>
            <div class="mt-3 flex justify-end">
                <button type="submit" class="bg-red-600 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-red-700 transition-colors">Send Reply</button>
            </div>
        </form>
    </div>

    <div class="flex items-center space-x-3">
        <form action="{{ route('admin.support.assign', $ticket) }}" method="POST" class="flex items-center space-x-2">
            @csrf
            <select name="assignee_id" class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                <option value="">Assign to...</option>
                @foreach($staff as $staffMember)
                <option value="{{ $staffMember->id }}" {{ $ticket->assignee_id === $staffMember->id ? 'selected' : '' }}>{{ $staffMember->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm hover:bg-gray-50 transition-colors">Assign</button>
        </form>

        @if($ticket->status !== 'resolved')
        <form action="{{ route('admin.support.resolve', $ticket) }}" method="POST">
            @csrf
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition-colors" onclick="return confirm('Mark this ticket as resolved?')">Resolve</button>
        </form>
        @endif

        @if($ticket->status !== 'escalated' && $ticket->status !== 'resolved')
        <form action="{{ route('admin.support.escalate', $ticket) }}" method="POST">
            @csrf
            <button type="submit" class="border border-red-600 text-red-600 px-4 py-2 rounded-lg text-sm hover:bg-red-50 transition-colors" onclick="return confirm('Escalate this ticket?')">Escalate</button>
        </form>
        @endif
    </div>
    @endif
</div>
@endsection
