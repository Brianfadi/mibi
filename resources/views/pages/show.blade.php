@extends('layouts.app')

@section('title', $page->title . ' — MIBI')
@section('meta_description', $page->meta_description ?? '')

@section('content')
<section class="bg-gradient-to-br from-black via-gray-900 to-red-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold">{{ $page->title }}</h1>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-lg max-w-none">
        {!! $page->content !!}
    </div>
</section>
@endsection
