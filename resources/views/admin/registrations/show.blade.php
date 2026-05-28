@extends('layouts.admin')

@section('title', 'Registration Detail')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.registrations.index') }}" class="text-gray-600 hover:text-red-600 text-sm mb-4 inline-block">← Back to Registrations</a>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex justify-between items-start mb-6">
            <h2 class="text-xl font-semibold">{{ $registration->user->name }}</h2>
            <span class="px-3 py-1 rounded-full text-xs
                @if($registration->status === 'pending') bg-yellow-100 text-yellow-800
                @elseif($registration->status === 'approved') bg-green-100 text-green-800
                @else bg-red-100 text-red-800 @endif">
                {{ ucfirst($registration->status) }}
            </span>
        </div>

        <dl class="space-y-4">
            <div class="flex justify-between py-2 border-b border-gray-100">
                <dt class="text-gray-600">Name</dt>
                <dd class="font-medium">{{ $registration->user->name }}</dd>
            </div>
            <div class="flex justify-between py-2 border-b border-gray-100">
                <dt class="text-gray-600">Email</dt>
                <dd class="font-medium">{{ $registration->user->email }}</dd>
            </div>
            <div class="flex justify-between py-2 border-b border-gray-100">
                <dt class="text-gray-600">Phone</dt>
                <dd>{{ $registration->user->phone ?? '—' }}</dd>
            </div>
            <div class="flex justify-between py-2 border-b border-gray-100">
                <dt class="text-gray-600">Address</dt>
                <dd class="text-right max-w-sm">{{ $registration->address ?? '—' }}</dd>
            </div>
            <div class="flex justify-between py-2 border-b border-gray-100">
                <dt class="text-gray-600">Date of Birth</dt>
                <dd>{{ $registration->dob?->format('F j, Y') ?? '—' }}</dd>
            </div>
            <div class="flex justify-between py-2 border-b border-gray-100">
                <dt class="text-gray-600">Status</dt>
                <dd>
                    <span class="text-xs px-2 py-1 rounded-full
                        @if($registration->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($registration->status === 'approved') bg-green-100 text-green-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ ucfirst($registration->status) }}
                    </span>
                </dd>
            </div>
            <div class="flex justify-between py-2 border-b border-gray-100">
                <dt class="text-gray-600">Coach</dt>
                <dd>{{ $registration->assignedCoach?->name ?? 'Unassigned' }}</dd>
            </div>
            @if($registration->notes)
            <div class="flex justify-between py-2">
                <dt class="text-gray-600">Notes</dt>
                <dd class="text-right max-w-sm">{{ $registration->notes }}</dd>
            </div>
            @endif
        </dl>

        <div class="mt-6 flex gap-3">
            @if($registration->status === 'pending')
            <form action="{{ route('admin.registrations.approve', $registration) }}" method="POST" class="flex items-center gap-2">
                @csrf
                <select name="coach_id" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500" required>
                    <option value="">Assign coach...</option>
                    @foreach($coaches as $coach)
                    <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700">Approve</button>
            </form>
            <form action="{{ route('admin.registrations.reject', $registration) }}" method="POST" onsubmit="return confirm('Reject this registration?')">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">Reject</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
