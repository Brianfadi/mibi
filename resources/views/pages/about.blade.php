@extends('layouts.app')

@section('title', 'About MIBI — Where Love Faces Reality')
@section('meta_description', 'Learn about MIBI — our mission, vision, and commitment to emotional healing and relationship wellness.')

@section('content')
<section class="bg-gradient-to-br from-black via-gray-900 to-red-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">About MIBI</h1>
        <p class="text-xl text-gray-300">Make It or Break It — Healing Hearts, Transforming Lives</p>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Who We Are</h2>
            <p class="text-lg text-gray-600 leading-relaxed">
                MIBI is a modern emotional wellness and relationship coaching platform designed to help individuals and couples navigate the complexities of love, healing, and personal growth. We believe that every relationship deserves a chance to heal and transform.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 mb-16">
            <div class="bg-gray-50 rounded-xl p-8">
                <h3 class="text-xl font-bold text-gray-900 mb-3">Our Mission</h3>
                <p class="text-gray-600">To provide compassionate, professional emotional support and relationship coaching that empowers individuals and couples to heal, grow, and build healthier connections.</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-8">
                <h3 class="text-xl font-bold text-gray-900 mb-3">Our Vision</h3>
                <p class="text-gray-600">To become a globally recognized emotional wellness brand that transforms relationships and changes lives through accessible, professional coaching and community support.</p>
            </div>
        </div>

        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Our Core Values</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">❤️</span>
                    </div>
                    <h3 class="font-semibold mb-2">Compassion</h3>
                    <p class="text-gray-600 text-sm">Every healing journey is honored with empathy and understanding.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">🔍</span>
                    </div>
                    <h3 class="font-semibold mb-2">Truth</h3>
                    <p class="text-gray-600 text-sm">Where love faces reality — honest conversations lead to real healing.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">🌱</span>
                    </div>
                    <h3 class="font-semibold mb-2">Growth</h3>
                    <p class="text-gray-600 text-sm">We believe in the power of personal transformation and emotional evolution.</p>
                </div>
            </div>
        </div>

        <div class="bg-black text-white rounded-2xl p-8 md:p-12 text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">What MIBI Stands For</h2>
            <p class="text-gray-300 text-lg leading-relaxed max-w-3xl mx-auto">
                MIBI stands for <strong class="text-white">Make It or Break It</strong> — a reminder that relationships require intentional effort, honest communication, and emotional courage. We are here to help you make it.
            </p>
            <p class="text-red-400 text-xl mt-6">"Where Love Faces Reality ❤️"</p>
        </div>
    </div>
</section>
@endsection
