@extends('layouts.admin')

@section('title', 'Pages')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold">CMS Pages</h2>
    <a href="{{ route('admin.pages.create') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">New Page</a>
</div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left px-6 py-3 font-medium">Title</th>
                <th class="text-left px-6 py-3 font-medium">Slug</th>
                <th class="text-left px-6 py-3 font-medium">Template</th>
                <th class="text-left px-6 py-3 font-medium">Status</th>
                <th class="text-left px-6 py-3 font-medium">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($pages as $page)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium">{{ $page->title }}</td>
                <td class="px-6 py-4 text-gray-600">/{{ $page->slug }}</td>
                <td class="px-6 py-4 capitalize">{{ $page->template }}</td>
                <td class="px-6 py-4">
                    <span class="text-xs px-2 py-1 rounded-full {{ $page->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $page->is_published ? 'Published' : 'Draft' }}
                    </span>
                </td>
                <td class="px-6 py-4 space-x-2">
                    <a href="{{ route('admin.pages.edit', $page) }}" class="text-red-600 hover:text-red-700">Edit</a>
                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-700">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $pages->links() }}</div>
@endsection
