@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold">All Services</h2>
    <a href="{{ route('admin.services.create') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700 transition">Add Service</a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left px-6 py-3 font-medium">Title</th>
                <th class="text-left px-6 py-3 font-medium">Price</th>
                <th class="text-left px-6 py-3 font-medium">Duration</th>
                <th class="text-left px-6 py-3 font-medium">Type</th>
                <th class="text-left px-6 py-3 font-medium">Status</th>
                <th class="text-left px-6 py-3 font-medium">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($services as $service)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium">{{ $service->title }}</td>
                <td class="px-6 py-4">{{ $service->formatted_price }}</td>
                <td class="px-6 py-4">{{ $service->duration_label }}</td>
                <td class="px-6 py-4 capitalize">{{ $service->session_type }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-xs {{ $service->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $service->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.services.edit', $service) }}" class="text-red-600 hover:text-red-700">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
