@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold">Testimonials</h2>
    <a href="{{ route('admin.testimonials.create') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">Add Testimonial</a>
</div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left px-6 py-3 font-medium">Author</th>
                <th class="text-left px-6 py-3 font-medium">Content</th>
                <th class="text-left px-6 py-3 font-medium">Rating</th>
                <th class="text-left px-6 py-3 font-medium">Status</th>
                <th class="text-left px-6 py-3 font-medium">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($testimonials as $t)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium">{{ $t->author_name }}</td>
                <td class="px-6 py-4 max-w-xs truncate text-gray-600">{{ $t->content }}</td>
                <td class="px-6 py-4 text-red-500">{{ $t->rating ? str_repeat('★', $t->rating) : '—' }}</td>
                <td class="px-6 py-4">
                    <span class="text-xs px-2 py-1 rounded-full {{ $t->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ $t->is_published ? 'Published' : 'Draft' }}
                    </span>
                </td>
                <td class="px-6 py-4 space-x-2">
                    <a href="{{ route('admin.testimonials.edit', $t) }}" class="text-red-600 hover:text-red-700">Edit</a>
                    <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-700">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $testimonials->links() }}</div>
@endsection
