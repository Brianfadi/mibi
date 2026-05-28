@extends('layouts.admin')

@section('title', 'FAQs')

@section('content')
<div class="grid md:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold mb-4">Add FAQ</h2>
        <form action="{{ route('admin.faqs.store') }}" method="POST" class="space-y-3">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Category</label>
                <select name="category" class="w-full px-4 py-2 border rounded-lg">
                    <option value="general">General</option>
                    <option value="services">Services</option>
                    <option value="payment">Payment</option>
                    <option value="booking">Booking</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Question *</label>
                <input type="text" name="question" required maxlength="500" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Answer *</label>
                <textarea name="answer" rows="3" required class="w-full px-4 py-2 border rounded-lg"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Sort Order</label>
                <input type="number" name="sort_order" value="0" min="0" class="w-24 px-4 py-2 border rounded-lg">
            </div>
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">Add FAQ</button>
        </form>
    </div>

    <div class="space-y-4">
        <h2 class="text-lg font-semibold">Existing FAQs</h2>
        @foreach($faqs as $category => $categoryFaqs)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <h3 class="font-semibold text-sm text-gray-600 uppercase mb-3">{{ $category }}</h3>
            <div class="space-y-2">
                @foreach($categoryFaqs as $faq)
                <details class="border border-gray-100 rounded-lg p-3 text-sm">
                    <summary class="cursor-pointer font-medium flex justify-between items-center">
                        {{ $faq->question }}
                        <div class="flex items-center gap-2">
                            @if(!$faq->is_published)
                                <span class="text-xs text-yellow-600">Draft</span>
                            @endif
                            <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700 text-xs">🗑</button>
                            </form>
                        </div>
                    </summary>
                    <div class="mt-2 text-gray-600">{{ $faq->answer }}</div>
                    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST" class="mt-2 pt-2 border-t border-gray-100 flex gap-2">
                        @csrf @method('PUT')
                        <input type="hidden" name="question" value="{{ $faq->question }}">
                        <textarea name="answer" rows="2" class="flex-1 px-3 py-1 border rounded text-sm">{{ $faq->answer }}</textarea>
                        <input type="hidden" name="category" value="{{ $faq->category }}">
                        <input type="hidden" name="is_published" value="{{ $faq->is_published ? '1' : '0' }}">
                        <button type="submit" class="bg-gray-100 px-3 py-1 rounded text-sm hover:bg-gray-200">Save</button>
                    </form>
                </details>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
