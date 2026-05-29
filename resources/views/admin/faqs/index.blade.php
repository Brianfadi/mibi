@extends('layouts.admin')

@section('title', 'FAQs')

@section('content')
<div class="w-full space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-2xl p-6 lg:p-8 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="relative flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center shadow-lg shadow-red-600/30">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-white">FAQs</h2>
                <p class="text-gray-400 text-sm mt-0.5">Manage frequently asked questions</p>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-5 gap-6">
        <!-- Add FAQ Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-100 flex items-center space-x-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center shadow-sm">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-gray-900">Add New FAQ</h3>
                </div>
                <form action="{{ route('admin.faqs.store') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-1.5">Category</label>
                        <select name="category" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 bg-white text-sm">
                            <option value="general">General</option>
                            <option value="services">Services</option>
                            <option value="payment">Payment</option>
                            <option value="booking">Booking</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-1.5">Question *</label>
                        <input type="text" name="question" required maxlength="500" placeholder="e.g. How do I book a session?" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-1.5">Answer *</label>
                        <textarea name="answer" rows="5" required placeholder="Write the answer..." class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 resize-none text-sm"></textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-1.5">Sort Order</label>
                            <input type="number" name="sort_order" value="0" min="0" class="w-20 px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 text-sm">
                        </div>
                        <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-6 py-3 rounded-xl font-semibold text-sm transition-all hover:scale-105 shadow-lg shadow-red-600/20">
                            <svg class="w-4 h-4 inline mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Add FAQ
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Existing FAQs -->
        <div class="lg:col-span-3 space-y-6">
            @forelse($faqs as $category => $categoryFaqs)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        @php
                            $catColors = ['general' => 'bg-blue-100 text-blue-700', 'services' => 'bg-purple-100 text-purple-700', 'payment' => 'bg-yellow-100 text-yellow-700', 'booking' => 'bg-green-100 text-green-700'];
                            $catColor = $catColors[$category] ?? 'bg-gray-100 text-gray-700';
                        @endphp
                        <span class="text-xs px-3 py-1 rounded-lg font-bold uppercase tracking-wider {{ $catColor }}">{{ $category }}</span>
                        <span class="text-xs text-gray-400 font-medium">{{ count($categoryFaqs) }} item{{ count($categoryFaqs) !== 1 ? 's' : '' }}</span>
                    </div>
                </div>
                <div class="divide-y divide-gray-100">
                    @foreach($categoryFaqs as $faq)
                    <details class="group {{ $loop->first ? '' : '' }}">
                        <summary class="flex items-center justify-between p-5 cursor-pointer hover:bg-gray-50 transition-colors list-none">
                            <div class="flex items-center gap-3 min-w-0 flex-1">
                                <svg class="w-4 h-4 text-red-500 flex-shrink-0 group-open:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                <span class="font-medium text-gray-900 text-sm">{{ $faq->question }}</span>
                            </div>
                            <div class="flex items-center gap-2 flex-shrink-0 ml-3">
                                @if(!$faq->is_published)
                                <span class="text-xs px-2 py-0.5 rounded-full bg-yellow-100 text-yellow-700 border border-yellow-200 font-medium">Draft</span>
                                @else
                                <span class="text-xs px-2 py-0.5 rounded-full bg-green-100 text-green-700 border border-green-200 font-medium">Published</span>
                                @endif
                                <span class="text-xs text-gray-400 font-mono">#{{ $faq->sort_order }}</span>
                            </div>
                        </summary>
                        <div class="px-5 pb-5 pt-0">
                            <div class="bg-gray-50 rounded-xl p-4 text-sm text-gray-700 leading-relaxed">
                                {{ $faq->answer }}
                            </div>
                            <div class="mt-3 flex items-center justify-between">
                                <div class="flex gap-2">
                                    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="question" value="{{ $faq->question }}">
                                        <input type="hidden" name="answer" value="{{ $faq->answer }}">
                                        <input type="hidden" name="category" value="{{ $faq->category }}">
                                        <input type="hidden" name="is_published" value="{{ $faq->is_published ? '0' : '1' }}">
                                        <input type="hidden" name="sort_order" value="{{ $faq->sort_order }}">
                                        <button type="submit" class="text-xs px-3 py-1.5 rounded-lg font-medium {{ $faq->is_published ? 'bg-yellow-100 text-yellow-700 hover:bg-yellow-200' : 'bg-green-100 text-green-700 hover:bg-green-200' }} transition-colors">
                                            {{ $faq->is_published ? 'Unpublish' : 'Publish' }}
                                        </button>
                                    </form>
                                </div>
                                <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" onsubmit="return confirm('Delete this FAQ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-100 text-red-700 hover:bg-red-200 font-medium transition-colors flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </details>
                    @endforeach
                </div>
            </div>
            @empty
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-16 text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                </div>
                <p class="text-gray-500 font-medium">No FAQs yet</p>
                <p class="text-gray-400 text-sm mt-1">Add your first FAQ using the form.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection