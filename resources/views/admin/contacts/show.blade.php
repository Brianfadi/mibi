@extends('layouts.admin')

@section('title', 'Message from ' . $contact->name)

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
                <a href="{{ route('admin.contacts.index') }}" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center text-white border border-white/20 transition-all backdrop-blur-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                </a>
                <div>
                    <h2 class="text-2xl font-bold text-white">Contact Message</h2>
                    <p class="text-gray-400 text-sm mt-0.5">{{ $contact->subject ?? 'No Subject' }}</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="mailto:{{ $contact->email }}" class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white border border-red-500/30 rounded-xl text-sm font-medium transition-all shadow-lg shadow-red-600/30">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Reply via Email
                </a>
            </div>
        </div>
    </div>

    <!-- Message Details -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Sender Info -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Sender
            </h3>
            <div class="flex items-center gap-4 mb-5">
                <div class="w-14 h-14 bg-gradient-to-br from-red-100 to-red-200 rounded-2xl flex items-center justify-center text-xl font-bold text-red-700 flex-shrink-0">
                    {{ substr($contact->name, 0, 1) }}
                </div>
                <div>
                    <p class="font-bold text-gray-900 text-lg">{{ $contact->name }}</p>
                    <a href="mailto:{{ $contact->email }}" class="text-sm text-red-600 hover:text-red-700">{{ $contact->email }}</a>
                    @if($contact->phone)
                    <p class="text-sm text-gray-500 mt-0.5">{{ $contact->phone }}</p>
                    @endif
                </div>
            </div>

            <div class="space-y-3 border-t border-gray-100 pt-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Status</span>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                        @if($contact->is_read) bg-green-100 text-green-700 border border-green-200
                        @else bg-yellow-100 text-yellow-700 border border-yellow-200 @endif">
                        <span class="w-1.5 h-1.5 rounded-full mr-1.5
                            @if($contact->is_read) bg-green-500 @else bg-yellow-500 @endif">
                        </span>
                        {{ $contact->is_read ? 'Read' : 'Unread' }}
                    </span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Received</span>
                    <span class="text-sm font-medium text-gray-900">{{ $contact->created_at->format('M j, Y g:i A') }}</span>
                </div>
                @if($contact->is_read && $contact->reader)
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Read by</span>
                    <span class="text-sm font-medium text-gray-900">{{ $contact->reader->name }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Read at</span>
                    <span class="text-sm font-medium text-gray-900">{{ $contact->read_at->format('M j, Y g:i A') }}</span>
                </div>
                @endif
            </div>

            <div class="mt-5 pt-4 border-t border-gray-100">
                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Delete this message permanently?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 rounded-xl transition-all">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        Delete Message
                    </button>
                </form>
            </div>
        </div>

        <!-- Message Body -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            @if($contact->subject)
            <div class="px-6 pt-6 pb-3 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-900">{{ $contact->subject }}</h3>
            </div>
            @endif
            <div class="p-6">
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 lg:p-8 border border-gray-200 relative">
                    <div class="absolute top-0 left-0 w-12 h-12 bg-red-500/10 rounded-br-2xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311C9.591 11.69 11 13.166 11 15c0 1.933-1.567 3.5-3.5 3.5-1.271 0-2.404-.655-2.917-1.179zm10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311C19.591 11.69 21 13.166 21 15c0 1.933-1.567 3.5-3.5 3.5-1.271 0-2.404-.655-2.917-1.179z"/></svg>
                    </div>
                    <p class="text-gray-800 whitespace-pre-wrap leading-relaxed text-base relative z-10">{{ $contact->message }}</p>
                </div>
            </div>
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                <span class="text-xs text-gray-400">{{ Str::wordCount($contact->message) }} words</span>
                <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject ?? 'Your Message' }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-600 hover:text-white bg-red-50 hover:bg-red-600 rounded-lg transition-all">
                    <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Reply
                </a>
            </div>
        </div>
    </div>
</div>
@endsection