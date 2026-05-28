@extends('layouts.admin')

@section('title', 'Programs')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold">Coaching Programs</h2>
    <a href="{{ route('admin.programs.create') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">New Program</a>
</div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left px-6 py-3 font-medium">Title</th>
                <th class="text-left px-6 py-3 font-medium">Price</th>
                <th class="text-left px-6 py-3 font-medium">Duration</th>
                <th class="text-left px-6 py-3 font-medium">Featured</th>
                <th class="text-left px-6 py-3 font-medium">Status</th>
                <th class="text-left px-6 py-3 font-medium">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($programs as $program)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium">{{ $program->title }}</td>
                <td class="px-6 py-4">{{ $program->formatted_price }}</td>
                <td class="px-6 py-4">{{ $program->duration_label ?: '—' }}</td>
                <td class="px-6 py-4">{{ $program->is_featured ? '⭐' : '' }}</td>
                <td class="px-6 py-4">
                    <span class="text-xs px-2 py-1 rounded-full {{ $program->is_active ? 'bg-green-100' : 'bg-red-100' }}">
                        {{ $program->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.programs.edit', $program) }}" class="text-red-600 hover:text-red-700">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
