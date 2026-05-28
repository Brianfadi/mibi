@extends('layouts.app')

@section('title', 'Unsubscribed — MIBI')

@section('content')
<section class="min-h-[60vh] flex items-center justify-center bg-gray-50">
    <div class="text-center px-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">You've Been Unsubscribed</h1>
        <p class="text-gray-600 mb-6">You will no longer receive email communications from MIBI.</p>
        <p class="text-gray-500 mb-8">If this was a mistake, you can <a href="#" class="text-red-600 hover:text-red-700">resubscribe</a> anytime.</p>
        <a href="{{ route('home') }}" class="inline-block bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition">Back to Home</a>
    </div>
</section>
@endsection
