@extends('layouts.app')

@section('title', 'Book a Session — MIBI')

@section('content')
<section class="bg-gradient-to-br from-black via-gray-900 to-red-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Book a Session</h1>
        <p class="text-xl text-gray-300">Take the first step toward healing</p>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        @auth
            <div class="bg-gray-50 rounded-xl p-8">
                <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ request('service') ? \App\Models\Service::where('slug', request('service'))->first()?->id : old('service_id') }}">

                    <div>
                        <label for="service_id" class="block text-sm font-medium text-gray-700 mb-1">Select Service *</label>
                        <select name="service_id" id="service_id" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 @error('service_id') border-red-500 @enderror">
                            <option value="">Choose a service...</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}
                                        data-price="{{ $service->price }}" data-duration="{{ $service->duration_minutes }}">
                                    {{ $service->title }} — {{ $service->formatted_price }} ({{ $service->duration_label }})
                                </option>
                            @endforeach
                        </select>
                        @error('service_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="scheduled_at" class="block text-sm font-medium text-gray-700 mb-1">Preferred Date & Time *</label>
                        <input type="datetime-local" name="scheduled_at" id="scheduled_at" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 @error('scheduled_at') border-red-500 @enderror"
                               value="{{ old('scheduled_at') }}" min="{{ now()->addHours(24)->format('Y-m-d\TH:i') }}">
                        @error('scheduled_at') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="session_type" class="block text-sm font-medium text-gray-700 mb-1">Session Type *</label>
                        <select name="session_type" id="session_type" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500">
                            <option value="video">Video Call</option>
                            <option value="voice">Voice Call</option>
                            <option value="in_person">In Person (Nairobi)</option>
                        </select>
                    </div>

                    <div>
                        <label for="timezone" class="block text-sm font-medium text-gray-700 mb-1">Your Timezone</label>
                        <select name="timezone" id="timezone"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500">
                            @foreach(timezone_identifiers_list() as $tz)
                                <option value="{{ $tz }}" {{ old('timezone', auth()->user()->timezone ?? 'Africa/Nairobi') === $tz ? 'selected' : '' }}>{{ $tz }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Notes (optional)</label>
                        <textarea name="notes" id="notes" rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500">{{ old('notes') }}</textarea>
                    </div>

                    <!-- Payment Method -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Payment Method *</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-red-300 has-[:checked]:border-red-600 has-[:checked]:bg-red-50 transition">
                                <input type="radio" name="payment_method" value="mpesa" class="sr-only" checked>
                                <div class="text-center">
                                    <p class="font-semibold text-sm">M-Pesa</p>
                                    <p class="text-xs text-gray-500">Kenya</p>
                                </div>
                            </label>
                            <label class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-red-300 has-[:checked]:border-red-600 has-[:checked]:bg-red-50 transition">
                                <input type="radio" name="payment_method" value="stripe" class="sr-only">
                                <div class="text-center">
                                    <p class="font-semibold text-sm">Card</p>
                                    <p class="text-xs text-gray-500">Visa/Mastercard</p>
                                </div>
                            </label>
                            <label class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-red-300 has-[:checked]:border-red-600 has-[:checked]:bg-red-50 transition">
                                <input type="radio" name="payment_method" value="paypal" class="sr-only">
                                <div class="text-center">
                                    <p class="font-semibold text-sm">PayPal</p>
                                    <p class="text-xs text-gray-500">International</p>
                                </div>
                            </label>
                            <label class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-red-300 has-[:checked]:border-red-600 has-[:checked]:bg-red-50 transition">
                                <input type="radio" name="payment_method" value="bank_transfer" class="sr-only">
                                <div class="text-center">
                                    <p class="font-semibold text-sm">Bank Transfer</p>
                                    <p class="text-xs text-gray-500">Direct deposit</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div id="mpesa-phone" class="hidden">
                        <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">M-Pesa Phone Number *</label>
                        <input type="tel" name="phone_number" id="phone_number"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500"
                               placeholder="0712345678" value="{{ old('phone_number', auth()->user()->phone) }}">
                    </div>

                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-lg font-semibold text-lg transition">
                        Confirm Booking & Pay
                    </button>
                </form>
            </div>
        @else
            <div class="text-center py-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Please Sign In</h2>
                <p class="text-gray-600 mb-6">You need to be logged in to book a session.</p>
                <a href="{{ route('login') }}" class="bg-red-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-red-700 transition">Sign In</a>
                <p class="mt-4 text-gray-500">Don't have an account? <a href="{{ route('register') }}" class="text-red-600 hover:text-red-700">Register</a></p>
            </div>
        @endauth
    </div>
</section>

@push('scripts')
<script>
    document.querySelectorAll('input[name="payment_method"]').forEach(el => {
        el.addEventListener('change', function() {
            document.getElementById('mpesa-phone').classList.toggle('hidden', this.value !== 'mpesa');
        });
    });
</script>
@endpush
@endsection
