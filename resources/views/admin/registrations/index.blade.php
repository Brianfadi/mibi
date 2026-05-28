@extends('layouts.admin')

@section('title', 'Registrations')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold">All Registrations</h2>
    <div class="flex space-x-4">
        <a href="{{ route('admin.registrations.index') }}" class="text-sm px-4 py-2 rounded-lg {{ !request()->routeIs('admin.registrations.pending') ? 'bg-red-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">All</a>
        <a href="{{ route('admin.registrations.pending') }}" class="text-sm px-4 py-2 rounded-lg {{ request()->routeIs('admin.registrations.pending') ? 'bg-red-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">Pending</a>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="text-left px-6 py-3 font-medium">Name</th>
                    <th class="text-left px-6 py-3 font-medium">Email</th>
                    <th class="text-left px-6 py-3 font-medium">Phone</th>
                    <th class="text-left px-6 py-3 font-medium">Status</th>
                    <th class="text-left px-6 py-3 font-medium">Coach</th>
                    <th class="text-left px-6 py-3 font-medium">Registered</th>
                    <th class="text-left px-6 py-3 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($registrations as $registration)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.registrations.show', $registration) }}" class="flex items-center">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center text-xs font-bold text-red-600 mr-3">
                                {{ substr($registration->user->name, 0, 1) }}
                            </div>
                            <span class="font-medium">{{ $registration->user->name }}</span>
                        </a>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $registration->user->email }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $registration->user->phone ?? '—' }}</td>
                    <td class="px-6 py-4">
                        <span class="text-xs px-2 py-1 rounded-full
                            @if($registration->status === 'pending') bg-yellow-100 text-yellow-800
                            @elseif($registration->status === 'approved') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($registration->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        {{ $registration->assignedCoach?->name ?? 'Unassigned' }}
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $registration->created_at->format('M j, Y') }}</td>
                    <td class="px-6 py-4">
                        @if($registration->status === 'pending')
                        <button onclick="openApproveModal({{ $registration->id }})" class="text-green-600 hover:text-green-700 text-sm font-medium mr-3">Approve</button>
                        <form action="{{ route('admin.registrations.reject', $registration) }}" method="POST" class="inline" onsubmit="return confirm('Reject this registration?')">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium">Reject</button>
                        </form>
                        @elseif($registration->status === 'approved')
                        <span class="text-green-600 text-sm font-medium">Approved</span>
                        @else
                        <span class="text-red-600 text-sm font-medium">Rejected</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">No registrations found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-gray-100">
        {{ $registrations->links() }}
    </div>
</div>

<!-- Approve Modal -->
<div id="approveModal" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md mx-4">
        <h3 class="text-lg font-semibold mb-4">Approve Registration</h3>
        <form id="approveForm" method="POST">
            @csrf
            <div class="mb-4">
                <label for="coach_id" class="block text-sm font-medium text-gray-700 mb-1">Assign Coach</label>
                <select name="coach_id" id="coach_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    <option value="">Select a coach</option>
                    @foreach($coaches as $coach)
                    <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeApproveModal()" class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50">Cancel</button>
                <button type="submit" class="px-4 py-2 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700">Approve</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openApproveModal(id) {
    document.getElementById('approveForm').action = '/admin/registrations/' + id + '/approve';
    document.getElementById('approveModal').classList.remove('hidden');
}
function closeApproveModal() {
    document.getElementById('approveModal').classList.add('hidden');
}
document.getElementById('approveModal').addEventListener('click', function(e) {
    if (e.target === this) closeApproveModal();
});
</script>
@endpush
