@extends('layouts.admin')

@section('title', 'Subscribers')

@section('breadcrumb')
<span class="mx-1">/</span><span class="text-gray-500">Subscribers</span>
@endsection

@section('content')
<div class="bg-white rounded-xl p-8 shadow-sm border border-gray-100 text-center">
    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/></svg>
    </div>
    <p class="text-lg font-semibold text-gray-900 mb-2">View subscribers in the Subscribers section</p>
    <a href="{{ route('admin.subscribers.index') }}" class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors">
        Go to Subscribers
    </a>
</div>
@endsection
