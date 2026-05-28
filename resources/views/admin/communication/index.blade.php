@extends('layouts.admin')

@section('title', 'Communication')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Total Subscribers</p>
        <p class="text-3xl font-bold mt-1">{{ number_format($totalSubscribers) }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">WhatsApp Messages</p>
        <p class="text-3xl font-bold mt-1">{{ number_format($totalWhatsApp) }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Inbound</p>
        <p class="text-3xl font-bold mt-1 text-green-600">{{ number_format($inboundMessages) }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Outbound</p>
        <p class="text-3xl font-bold mt-1 text-blue-600">{{ number_format($outboundMessages) }}</p>
    </div>
</div>

<div class="grid md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <h2 class="text-lg font-semibold mb-4">Quick Actions</h2>
        <div class="space-y-3">
            <a href="{{ route('admin.communication.whatsapp') }}" class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <div>
                    <p class="font-medium text-sm">View WhatsApp Log</p>
                    <p class="text-xs text-gray-500">Browse all WhatsApp messages</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('admin.subscribers.index') }}" class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <div>
                    <p class="font-medium text-sm">View Subscribers</p>
                    <p class="text-xs text-gray-500">Manage your subscriber list</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>

    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <h2 class="text-lg font-semibold mb-4">Send Email Campaign</h2>
        <form method="POST" action="{{ route('admin.communication.send-email') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                <input type="text" name="subject" required class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                <textarea name="content" rows="4" required class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Recipients</label>
                <select name="recipients" required class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    <option value="all">All Subscribers</option>
                    <option value="active">Active Subscribers</option>
                    <option value="coaches">Coaches</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors">Send Campaign</button>
        </form>
    </div>
</div>

<div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
    <h2 class="text-lg font-semibold mb-4">Recent WhatsApp Messages</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-500 border-b border-gray-100">
                    <th class="pb-3 font-medium">From</th>
                    <th class="pb-3 font-medium">Message</th>
                    <th class="pb-3 font-medium">Direction</th>
                    <th class="pb-3 font-medium">Time</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentMessages as $msg)
                <tr class="border-b border-gray-50">
                    <td class="py-3">{{ $msg->from }}</td>
                    <td class="py-3 max-w-xs truncate">{{ $msg->message ?? $msg->body }}</td>
                    <td class="py-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $msg->direction === 'inbound' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ ucfirst($msg->direction) }}
                        </span>
                    </td>
                    <td class="py-3 text-gray-500">{{ $msg->created_at->format('M j, g:i A') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-4 text-gray-500 text-center">No recent messages.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
