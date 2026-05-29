@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
<div class="w-full space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-2xl p-6 lg:p-8 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center shadow-lg shadow-red-600/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Contact Messages</h2>
                    <p class="text-gray-400 text-sm mt-0.5">Messages from the contact form</p>
                </div>
            </div>
            <a href="{{ route('admin.contacts.unread') }}" class="inline-flex items-center px-4 py-2.5 bg-white/10 hover:bg-white/20 text-white border border-white/20 rounded-xl text-sm font-medium transition-all backdrop-blur-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                Unread Only
            </a>
        </div>
    </div>

    <!-- Stats -->
    @php
        $total = $contacts->total();
        $unreadCount = $contacts->where('is_read', false)->count();
    @endphp
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-gray-900">{{ $total }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Total Messages</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-yellow-600">{{ $unreadCount }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Unread</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-green-600">{{ $total - $unreadCount }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Read</p>
        </div>
    </div>

    <!-- Messages Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">From</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Subject</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Date</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Status</th>
                        <th class="text-right px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($contacts as $contact)
                    <tr class="hover:bg-gray-50 transition-colors {{ !$contact->is_read ? 'bg-red-50/30' : '' }}">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-gradient-to-br {{ !$contact->is_read ? 'from-red-100 to-red-200' : 'from-gray-100 to-gray-200' }} rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="text-xs font-bold {{ !$contact->is_read ? 'text-red-700' : 'text-gray-600' }} uppercase">{{ substr($contact->name, 0, 2) }}</span>
                                </div>
                                <div>
                                    <p class="font-medium {{ !$contact->is_read ? 'text-gray-900' : 'text-gray-700' }}">{{ $contact->name }}</p>
                                    <p class="text-xs {{ !$contact->is_read ? 'text-gray-500' : 'text-gray-400' }}">{{ $contact->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="{{ !$contact->is_read ? 'font-semibold text-gray-900' : 'text-gray-600' }}">{{ $contact->subject ?? 'No subject' }}</span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-sm whitespace-nowrap">{{ $contact->created_at->format('M j, Y g:i A') }}</td>
                        <td class="px-6 py-4">
                            @if($contact->is_read)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-gray-400 mr-1.5"></span>
                                    Read
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700 border border-yellow-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 mr-1.5"></span>
                                    New
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-600 hover:text-white bg-red-50 hover:bg-red-600 rounded-lg transition-all">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                View
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center">
                            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <p class="text-gray-500 font-medium">No messages yet</p>
                            <p class="text-gray-400 text-sm mt-1">Contact form submissions will appear here.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($contacts->hasPages())
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $contacts->links() }}
        </div>
        @endif
    </div>
</div>
@endsection