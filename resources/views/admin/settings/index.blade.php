@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<div class="max-w-3xl">
    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
        @csrf

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-semibold mb-4">General Settings</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Site Name</label>
                    <input type="text" name="site_name" value="{{ $settingsService->get('site_name') }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Site Description</label>
                    <textarea name="site_description" rows="2" class="w-full px-4 py-2 border rounded-lg">{{ $settingsService->get('site_description') }}</textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Contact Email</label>
                        <input type="email" name="contact_email" value="{{ $settingsService->get('contact_email') }}" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Contact Phone</label>
                        <input type="text" name="contact_phone" value="{{ $settingsService->get('contact_phone') }}" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp Number</label>
                    <input type="text" name="whatsapp_number" value="{{ $settingsService->get('whatsapp_number') }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-semibold mb-4">Social Media Links</h2>
            <div class="space-y-3">
                @foreach(['tiktok', 'instagram', 'facebook', 'youtube', 'twitter', 'linkedin'] as $platform)
                <div>
                    <label class="block text-sm font-medium text-gray-700 capitalize mb-1">{{ $platform }}</label>
                    <input type="url" name="social_{{ $platform }}" value="{{ $settingsService->get('social_' . $platform) }}" class="w-full px-4 py-2 border rounded-lg" placeholder="https://{{ $platform }}.com/...">
                </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-semibold mb-4">Payment Configuration</h2>
            <div class="space-y-4">
                <h3 class="font-medium text-sm text-gray-600">M-Pesa</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Consumer Key</label>
                        <input type="text" name="mpesa_consumer_key" value="{{ $settingsService->get('mpesa_consumer_key') }}" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Consumer Secret</label>
                        <input type="text" name="mpesa_consumer_secret" value="{{ $settingsService->get('mpesa_consumer_secret') }}" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Passkey</label>
                        <input type="text" name="mpesa_passkey" value="{{ $settingsService->get('mpesa_passkey') }}" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Shortcode</label>
                        <input type="text" name="mpesa_shortcode" value="{{ $settingsService->get('mpesa_shortcode', '174379') }}" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                </div>

                <h3 class="font-medium text-sm text-gray-600 pt-4">Stripe</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Publishable Key</label>
                        <input type="text" name="stripe_key" value="{{ $settingsService->get('stripe_key') }}" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Secret Key</label>
                        <input type="text" name="stripe_secret" value="{{ $settingsService->get('stripe_secret') }}" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="bg-red-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-red-700 transition">Save All Settings</button>
    </form>
</div>
@endsection
