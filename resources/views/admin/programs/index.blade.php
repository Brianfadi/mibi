@extends('layouts.admin')

@section('title', 'Programs')

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
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Coaching Programs</h2>
                    <p class="text-gray-400 text-sm mt-0.5">Manage your coaching program offerings</p>
                </div>
            </div>
            <a href="{{ route('admin.programs.create') }}" class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white border border-red-500/30 rounded-xl text-sm font-medium transition-all shadow-lg shadow-red-600/30">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                New Program
            </a>
        </div>
    </div>

    <!-- Programs Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Program</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Price</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Duration</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Featured</th>
                        <th class="text-left px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Status</th>
                        <th class="text-right px-6 py-4 font-bold text-gray-700 text-xs uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($programs as $program)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($program->image)
                                <img src="{{ asset('storage/' . $program->image) }}" class="w-10 h-10 rounded-xl object-cover flex-shrink-0">
                                @else
                                <div class="w-10 h-10 bg-gradient-to-br from-red-100 to-red-200 rounded-xl flex items-center justify-center text-xs font-bold text-red-700 flex-shrink-0">
                                    {{ substr($program->title, 0, 2) }}
                                </div>
                                @endif
                                <div>
                                    <p class="font-medium text-gray-900">{{ $program->title }}</p>
                                    @if($program->short_description)
                                    <p class="text-xs text-gray-400 mt-0.5 truncate max-w-xs">{{ $program->short_description }}</p>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-900">{{ $program->formatted_price ?? ($program->currency . ' ' . number_format($program->price, 2)) }}</span>
                        </td>
                        <td class="px-6 py-4 text-gray-700">{{ $program->duration_label ?: '—' }}</td>
                        <td class="px-6 py-4">
                            @if($program->is_featured)
                            <span class="text-lg">⭐</span>
                            @else
                            <span class="text-gray-300">—</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                @if($program->is_active) bg-green-100 text-green-700 border border-green-200
                                @else bg-red-100 text-red-700 border border-red-200 @endif">
                                <span class="w-1.5 h-1.5 rounded-full mr-1.5
                                    @if($program->is_active) bg-green-500 @else bg-red-500 @endif">
                                </span>
                                {{ $program->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.programs.edit', $program) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-600 hover:text-white bg-red-50 hover:bg-red-600 rounded-lg transition-all">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Edit
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            </div>
                            <p class="text-gray-500 font-medium">No programs yet</p>
                            <a href="{{ route('admin.programs.create') }}" class="text-red-600 text-sm hover:text-red-700 mt-1 inline-block">Create your first program</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection