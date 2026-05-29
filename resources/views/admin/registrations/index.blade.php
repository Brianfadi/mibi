@extends('layouts.admin')

@section('title', 'Registrations')

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
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Registrations</h2>
                    <p class="text-gray-400 text-sm mt-0.5">Review and manage applications</p>
                </div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.registrations.index') }}" class="px-4 py-2 rounded-xl text-sm font-medium transition-all {{ !request()->routeIs('admin.registrations.pending') ? 'bg-white text-red-600 shadow-sm' : 'bg-white/10 text-white border border-white/20 hover:bg-white/20 backdrop-blur-sm' }}">All</a>
                <a href="{{ route('admin.registrations.pending') }}" class="px-4 py-2 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.registrations.pending') ? 'bg-white text-red-600 shadow-sm' : 'bg-white/10 text-white border border-white/20 hover:bg-white/20 backdrop-blur-sm' }}">Pending</a>
            </div>
        </div>
    </div>

    <!-- Stats -->
    @php
        $pendingCount = $registrations->where('status', 'pending')->count();
        $approvedCount = $registrations->where('status', 'approved')->count();
        $rejectedCount = $registrations->where('status', 'rejected')->count();
    @endphp
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-yellow-600">{{ $pendingCount }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Pending</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-green-600">{{ $approvedCount }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Approved</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <p class="text-2xl font-bold text-red-600">{{ $rejectedCount }}</p>
            <p class="text-xs text-gray-500 font-medium mt-0.5">Rejected</p>
        </div>
    </div>

    <!-- Registrations Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Applicant</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Contact</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Status</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Coach</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Date</th>
                        <th class="text-right px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($registrations as $registration)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.registrations.show', $registration) }}" class="flex items-center gap-3 group">
                                <div class="w-9 h-9 bg-gradient-to-br from-red-100 to-red-200 rounded-xl flex items-center justify-center text-xs font-bold text-red-700 uppercase flex-shrink-0">
                                    {{ substr($registration->full_name ?? $registration->user->name, 0, 2) }}
                                </div>
                                <div>
                                    <span class="font-medium text-gray-900 group-hover:text-red-600 transition-colors">{{ $registration->full_name ?? $registration->user->name }}</span>
                                </div>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-gray-700 text-sm">{{ $registration->email ?? $registration->user->email }}</p>
                            <p class="text-xs text-gray-400">{{ $registration->phone ?? $registration->user->phone ?? '—' }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                @if($registration->status === 'pending') bg-yellow-100 text-yellow-700 border border-yellow-200
                                @elseif($registration->status === 'approved') bg-green-100 text-green-700 border border-green-200
                                @else bg-red-100 text-red-700 border border-red-200 @endif">
                                <span class="w-1.5 h-1.5 rounded-full mr-1.5
                                    @if($registration->status === 'pending') bg-yellow-500
                                    @elseif($registration->status === 'approved') bg-green-500
                                    @else bg-red-500 @endif">
                                </span>
                                {{ ucfirst($registration->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $registration->assignedCoach?->name ?? '—' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $registration->created_at->format('M j, Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-1.5">
                                @if($registration->status === 'pending')
                                <button onclick="openApproveModal({{ $registration->id }})" class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-green-600 hover:text-white bg-green-50 hover:bg-green-600 rounded-lg transition-all">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Approve
                                </button>
                                <form action="{{ route('admin.registrations.reject', $registration) }}" method="POST" onsubmit="return confirm('Reject this registration?')">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-red-600 hover:text-white bg-red-50 hover:bg-red-600 rounded-lg transition-all">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                        Reject
                                    </button>
                                </form>
                                @elseif($registration->status === 'approved')
                                <span class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-green-700 bg-green-50 rounded-lg">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Approved
                                </span>
                                @else
                                <span class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-red-700 bg-red-50 rounded-lg">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    Rejected
                                </span>
                                @endif
                                <a href="{{ route('admin.registrations.show', $registration) }}" class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-gray-600 hover:text-white bg-gray-100 hover:bg-gray-600 rounded-lg transition-all">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    View
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                            </div>
                            <p class="text-gray-500 font-medium">No registrations found</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($registrations->hasPages())
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $registrations->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Approve Modal -->
<div id="approveModal" class="fixed inset-0 bg-black/60 z-50 hidden flex items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-md mx-4 border border-gray-100">
        <div class="flex items-center space-x-3 mb-5 pb-3 border-b border-gray-100">
            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center shadow-sm">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-900">Approve Registration</h3>
                <p class="text-sm text-gray-500">Assign a coach and approve this applicant</p>
            </div>
        </div>
        <form id="approveForm" method="POST">
            @csrf
            <div class="mb-5">
                <label for="coach_id" class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-1.5">Assign Coach</label>
                <select name="coach_id" id="coach_id" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 bg-white text-sm">
                    <option value="">Select a coach</option>
                    @foreach($coaches as $coach)
                    <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeApproveModal()" class="px-5 py-2.5 text-sm font-medium border border-gray-200 rounded-xl hover:bg-gray-50 transition-all">Cancel</button>
                <button type="submit" class="px-5 py-2.5 text-sm font-medium bg-gradient-to-r from-green-600 to-green-700 hover:from-green-500 hover:to-green-600 text-white rounded-xl transition-all hover:scale-105 shadow-lg shadow-green-600/20">Approve &amp; Send Credentials</button>
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
    document.body.style.overflow = 'hidden';
}
function closeApproveModal() {
    document.getElementById('approveModal').classList.add('hidden');
    document.body.style.overflow = '';
}
document.getElementById('approveModal').addEventListener('click', function(e) {
    if (e.target === this) closeApproveModal();
});
</script>
@endpush