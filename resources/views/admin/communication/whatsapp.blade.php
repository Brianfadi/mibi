@extends('layouts.admin')

@section('title', 'WhatsApp Messages')

@php
$breadcrumbs = [
    ['label' => 'Communication', 'route' => 'admin.communication.index'],
    ['label' => 'WhatsApp Messages'],
];
@endphp

@section('breadcrumb')
@foreach($breadcrumbs as $crumb)
    @if(isset($crumb['route']))
        <span class="mx-1">/</span><a href="{{ route($crumb['route']) }}" class="hover:text-gray-600">{{ $crumb['label'] }}</a>
    @else
        <span class="mx-1">/</span><span class="text-gray-500">{{ $crumb['label'] }}</span>
    @endif
@endforeach
@endsection

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-500 border-b border-gray-100 bg-gray-50">
                    <th class="px-6 py-4 font-medium">ID</th>
                    <th class="px-6 py-4 font-medium">From</th>
                    <th class="px-6 py-4 font-medium">Message</th>
                    <th class="px-6 py-4 font-medium">Direction</th>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium">Created</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-gray-500">{{ $msg->id }}</td>
                    <td class="px-6 py-4 font-medium">{{ $msg->from }}</td>
                    <td class="px-6 py-4 max-w-xs truncate">{{ $msg->message ?? $msg->body }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $msg->direction === 'inbound' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ ucfirst($msg->direction) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            @if($msg->status === 'sent' || $msg->status === 'delivered') bg-green-100 text-green-800
                            @elseif($msg->status === 'failed') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ ucfirst($msg->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $msg->created_at->format('M j, Y g:i A') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-gray-500 text-center">No WhatsApp messages found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if(method_exists($messages, 'links'))
    <div class="px-6 py-4 border-t border-gray-100">
        {{ $messages->links() }}
    </div>
    @endif
</div>
@endsection
