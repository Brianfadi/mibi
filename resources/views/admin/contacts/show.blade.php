@extends('layouts.admin')

@section('title', 'Message from ' . $contact->name)

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.contacts.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back to Messages</a>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="mb-6">
            <h2 class="text-xl font-semibold">{{ $contact->subject ?? 'No Subject' }}</h2>
            <div class="flex items-center gap-4 mt-2 text-sm text-gray-500">
                <span>From: <strong>{{ $contact->name }}</strong></span>
                <span>Email: <a href="mailto:{{ $contact->email }}" class="text-red-600">{{ $contact->email }}</a></span>
                @if($contact->phone)
                    <span>Phone: {{ $contact->phone }}</span>
                @endif
            </div>
            <p class="text-xs text-gray-400 mt-1">{{ $contact->created_at->format('F j, Y g:i A') }}</p>
        </div>
        <div class="bg-gray-50 rounded-lg p-6">
            <p class="text-gray-800 whitespace-pre-wrap">{{ $contact->message }}</p>
        </div>
        <div class="mt-6 flex gap-3">
            <a href="mailto:{{ $contact->email }}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">Reply via Email</a>
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                @csrf @method('DELETE')
                <button type="submit" class="border border-red-600 text-red-600 px-4 py-2 rounded-lg text-sm hover:bg-red-50">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
