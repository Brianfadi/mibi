@extends('layouts.admin')

@section('title', 'Activity Logs')

@section('breadcrumb')
<span class="mx-2">/</span>
<a href="{{ route('admin.security.index') }}" class="hover:text-gray-600">Security</a>
<span class="mx-2">/</span>
<span class="text-gray-600">Activity Logs</span>
@endsection

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-lg font-semibold">Activity Logs</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="text-left px-6 py-3 font-medium">User</th>
                    <th class="text-left px-6 py-3 font-medium">Action</th>
                    <th class="text-left px-6 py-3 font-medium">Details</th>
                    <th class="text-left px-6 py-3 font-medium">IP Address</th>
                    <th class="text-left px-6 py-3 font-medium">Timestamp</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($logs as $log)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-7 h-7 bg-gray-100 rounded-full flex items-center justify-center text-xs font-bold text-gray-600 mr-2">
                                {{ substr($log->user?->name ?? '?', 0, 1) }}
                            </div>
                            <span class="font-medium">{{ $log->user?->name ?? 'System' }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-700">{{ $log->description }}</td>
                    <td class="px-6 py-4 text-gray-500 max-w-xs truncate">
                        @if($log->properties && $log->properties->count())
                            <span title="{{ $log->properties }}">{{ json_encode($log->properties->toArray()) }}</span>
                        @else
                            <span class="text-gray-400">—</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-500 font-mono text-xs">{{ $log->ip_address ?? '—' }}</td>
                    <td class="px-6 py-4 text-gray-500 whitespace-nowrap">{{ $log->created_at->format('M j, Y g:i A') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">No activity logs found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-gray-100">
        {{ $logs->links() }}
    </div>
</div>
@endsection
