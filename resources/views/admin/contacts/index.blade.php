@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold">Contact Messages</h2>
    <a href="{{ route('admin.contacts.unread') }}" class="text-red-600 text-sm hover:text-red-700">Unread Only</a>
</div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left px-6 py-3 font-medium">From</th>
                <th class="text-left px-6 py-3 font-medium">Subject</th>
                <th class="text-left px-6 py-3 font-medium">Date</th>
                <th class="text-left px-6 py-3 font-medium">Status</th>
                <th class="text-left px-6 py-3 font-medium">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($contacts as $contact)
            <tr class="hover:bg-gray-50 {{ !$contact->is_read ? 'font-semibold' : '' }}">
                <td class="px-6 py-4">{{ $contact->name }}<br><span class="text-gray-500 text-xs">{{ $contact->email }}</span></td>
                <td class="px-6 py-4">{{ $contact->subject ?? 'No subject' }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $contact->created_at->format('M j, Y g:i A') }}</td>
                <td class="px-6 py-4">
                    @if($contact->is_read)
                        <span class="text-xs text-gray-500">Read</span>
                    @else
                        <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">New</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.contacts.show', $contact) }}" class="text-red-600 hover:text-red-700">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $contacts->links() }}</div>
@endsection
