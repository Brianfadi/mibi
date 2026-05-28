@extends('layouts.admin')

@section('title', 'Notifications')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold">
        Notifications
        @if($unreadCount > 0)
        <span class="ml-2 text-sm font-normal text-gray-500">({{ $unreadCount }} unread)</span>
        @endif
    </h2>
    @if($unreadCount > 0)
    <form action="{{ route('admin.notifications.mark-all-read') }}" method="POST">
        @csrf
        <button type="submit" class="border border-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm hover:bg-gray-50 transition">Mark All Read</button>
    </form>
    @endif
</div>

<div class="space-y-3">
    @forelse($notifications as $notification)
    @php
        $type = $notification->data['type'] ?? null;
        $title = $notification->data['title'] ?? 'Notification';
        $message = $notification->data['message'] ?? '';
        $isUnread = is_null($notification->read_at);

        $icon = '';
        switch($type) {
            case 'booking': $icon = '<svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>'; break;
            case 'registration': $icon = '<svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>'; break;
            case 'support': $icon = '<svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>'; break;
            default: $icon = '<svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>';
        }

        $link = null;
        if ($type === 'booking' && isset($notification->data['booking_id'])) {
            $link = route('admin.bookings.show', $notification->data['booking_id']);
        } elseif ($type === 'registration' && isset($notification->data['registration_id'])) {
            $link = route('admin.registrations.show', $notification->data['registration_id']);
        } elseif ($type === 'support' && isset($notification->data['ticket_id'])) {
            $link = route('admin.support.show', $notification->data['ticket_id']);
        }
    @endphp
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 {{ $isUnread ? 'border-l-4 border-l-red-500' : '' }} overflow-hidden">
        <div class="p-4 flex items-start gap-4">
            <div class="flex-shrink-0 p-2 bg-gray-50 rounded-lg">
                {!! $icon !!}
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-start justify-between gap-2">
                    <div>
                        <p class="text-sm font-semibold text-gray-900">{{ $title }}</p>
                        <p class="text-sm text-gray-600 mt-0.5">{{ $message }}</p>
                    </div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <span class="text-xs text-gray-400 whitespace-nowrap">{{ $notification->created_at->diffForHumans() }}</span>
                        <form action="{{ route('admin.notifications.destroy', $notification) }}" method="POST" onsubmit="return confirm('Delete this notification?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-gray-400 hover:text-red-600 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @if($link)
                <a href="{{ $link }}" class="inline-block mt-2 text-xs text-red-600 hover:text-red-700 font-medium">View details &rarr;</a>
                @endif
            </div>
        </div>
    </div>
    @empty
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 text-center text-gray-500">
        <p>No notifications found.</p>
    </div>
    @endforelse
</div>

<div class="mt-6">
    {{ $notifications->links() }}
</div>
@endsection
