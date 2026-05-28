@extends('layouts.admin')

@section('title', 'Subscribers')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <p class="text-sm text-gray-500">Total Subscribers</p>
        <p class="text-2xl font-bold text-gray-900">{{ $totalCount }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <p class="text-sm text-gray-500">Active</p>
        <p class="text-2xl font-bold text-green-600">{{ $activeCount }}</p>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
        <h2 class="text-lg font-semibold">All Subscribers</h2>
        <a href="{{ route('admin.subscribers.export') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">Export Emails</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="text-left px-6 py-3 font-medium">Email</th>
                    <th class="text-left px-6 py-3 font-medium">Status</th>
                    <th class="text-left px-6 py-3 font-medium">Subscribed Date</th>
                    <th class="text-left px-6 py-3 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($subscribers as $subscriber)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium">{{ $subscriber->email }}</td>
                    <td class="px-6 py-4">
                        <span class="text-xs px-2 py-1 rounded-full {{ $subscriber->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $subscriber->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $subscriber->created_at->format('M j, Y') }}</td>
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.subscribers.destroy', $subscriber) }}" method="POST" class="inline" onsubmit="return confirm('Delete this subscriber?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700 text-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-gray-100">
        {{ $subscribers->links() }}
    </div>
</div>
@endsection