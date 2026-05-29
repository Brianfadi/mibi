@extends('layouts.admin')

@section('title', 'Services')

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
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Services</h2>
                    <p class="text-gray-400 text-sm mt-0.5">Manage your coaching and therapy services</p>
                </div>
            </div>
            <a href="{{ route('admin.services.create') }}" class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white border border-red-500/30 rounded-xl text-sm font-medium transition-all shadow-lg shadow-red-600/30">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add Service
            </a>
        </div>
    </div>

    <!-- Services Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Service</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Price</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Duration</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Type</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Status</th>
                        <th class="text-right px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($services as $service)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($service->icon)
                                <img src="{{ asset('storage/' . $service->icon) }}" class="w-10 h-10 rounded-xl object-cover flex-shrink-0">
                                @elseif($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" class="w-10 h-10 rounded-xl object-cover flex-shrink-0">
                                @else
                                <div class="w-10 h-10 bg-gradient-to-br from-red-100 to-red-200 rounded-xl flex items-center justify-center text-xs font-bold text-red-700 flex-shrink-0">
                                    {{ substr($service->title, 0, 2) }}
                                </div>
                                @endif
                                <div>
                                    <p class="font-medium text-gray-900">{{ $service->title }}</p>
                                    @if($service->short_description)
                                    <p class="text-xs text-gray-400 mt-0.5 truncate max-w-xs">{{ $service->short_description }}</p>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-900">{{ $service->formatted_price ?? ($service->currency . ' ' . number_format($service->price, 2)) }}</span>
                        </td>
                        <td class="px-6 py-4 text-gray-700">{{ $service->duration_label }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                @if($service->session_type === 'individual') bg-purple-100 text-purple-700 border border-purple-200
                                @elseif($service->session_type === 'couples') bg-pink-100 text-pink-700 border border-pink-200
                                @else bg-blue-100 text-blue-700 border border-blue-200 @endif">
                                {{ ucfirst($service->session_type) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                @if($service->is_active) bg-green-100 text-green-700 border border-green-200
                                @else bg-red-100 text-red-700 border border-red-200 @endif">
                                <span class="w-1.5 h-1.5 rounded-full mr-1.5
                                    @if($service->is_active) bg-green-500 @else bg-red-500 @endif">
                                </span>
                                {{ $service->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.services.edit', $service) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-600 hover:text-white bg-red-50 hover:bg-red-600 rounded-lg transition-all">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Edit
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                            </div>
                            <p class="text-gray-500 font-medium">No services yet</p>
                            <a href="{{ route('admin.services.create') }}" class="text-red-600 text-sm hover:text-red-700 mt-1 inline-block">Create your first service</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection