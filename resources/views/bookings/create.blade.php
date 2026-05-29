@extends('layouts.app')

@section('title', 'Book a Session — MIBI')

@push('styles')
<style>
.scroll-reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s cubic-bezier(0.16,1,0.3,1); }
.scroll-reveal.revealed { opacity: 1; transform: translateY(0); }
</style>
@endpush

@section('content')
<section class="relative bg-black text-white py-20 overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ asset('images/IMG-20260528-WA0015.jpg') }}" alt="" class="w-full h-full object-cover opacity-25">
    <div class="absolute inset-0 bg-gradient-to-br from-black/80 via-gray-900/80 to-red-900/80"></div>
  </div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center scroll-reveal">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">Book a Session</h1>
    <p class="text-xl text-gray-300">Take the first step toward healing</p>
  </div>
</section>

<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    @auth
    <div class="grid lg:grid-cols-3 gap-10">
      <!-- Form -->
      <div class="lg:col-span-2 scroll-reveal">
        <div class="bg-gray-50 rounded-3xl p-8 lg:p-10 border border-gray-200">
          <h2 class="text-2xl font-bold text-gray-900 mb-2">Complete Your Booking</h2>
          <p class="text-gray-600 mb-8">Fill in the details below to schedule your private session.</p>
          <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
            @csrf
            @php
              $preselectedService = request('service') ? \App\Models\Service::where('slug', request('service'))->first() : null;
              $preselectedId = $preselectedService?->id ?? old('service_id');
            @endphp
            @if($preselectedService)
              <input type="hidden" name="service_id" value="{{ $preselectedService->id }}">
            @endif

            <div>
              <label for="service_id" class="block text-sm font-medium text-gray-700 mb-1">Select Service *</label>
              <select name="service_id" id="service_id" required
                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 @error('service_id') border-red-500 @enderror">
                <option value="">Choose a service...</option>
                @foreach($services as $service)
                  <option value="{{ $service->id }}" {{ $preselectedId == $service->id ? 'selected' : '' }}
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
                     class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 @error('scheduled_at') border-red-500 @enderror"
                     value="{{ old('scheduled_at') }}" min="{{ now()->addHours(24)->format('Y-m-d\TH:i') }}">
              @error('scheduled_at') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
              <label for="session_type" class="block text-sm font-medium text-gray-700 mb-1">Session Type *</label>
              <select name="session_type" id="session_type" required
                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500">
                <option value="video">Video Call</option>
                <option value="voice">Voice Call</option>
                <option value="in_person">In Person (Nairobi)</option>
              </select>
            </div>

            <div>
              <label for="timezone" class="block text-sm font-medium text-gray-700 mb-1">Your Timezone</label>
              <select name="timezone" id="timezone"
                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500">
                @foreach(timezone_identifiers_list() as $tz)
                  <option value="{{ $tz }}" {{ old('timezone', auth()->user()->timezone ?? 'Africa/Nairobi') === $tz ? 'selected' : '' }}>{{ $tz }}</option>
                @endforeach
              </select>
            </div>

            <div>
              <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Notes (optional)</label>
              <textarea name="notes" id="notes" rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500">{{ old('notes') }}</textarea>
            </div>

            <!-- Payment Method -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-3">Payment Method *</label>
              <div class="grid grid-cols-2 gap-3">
                <label class="border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-red-300 has-[:checked]:border-red-600 has-[:checked]:bg-red-50 transition">
                  <input type="radio" name="payment_method" value="mpesa" class="sr-only" checked>
                  <div class="text-center">
                    <p class="font-semibold text-sm">M-Pesa</p>
                    <p class="text-xs text-gray-500">Kenya</p>
                  </div>
                </label>
                <label class="border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-red-300 has-[:checked]:border-red-600 has-[:checked]:bg-red-50 transition">
                  <input type="radio" name="payment_method" value="stripe" class="sr-only">
                  <div class="text-center">
                    <p class="font-semibold text-sm">Card</p>
                    <p class="text-xs text-gray-500">Visa/Mastercard</p>
                  </div>
                </label>
                <label class="border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-red-300 has-[:checked]:border-red-600 has-[:checked]:bg-red-50 transition">
                  <input type="radio" name="payment_method" value="paypal" class="sr-only">
                  <div class="text-center">
                    <p class="font-semibold text-sm">PayPal</p>
                    <p class="text-xs text-gray-500">International</p>
                  </div>
                </label>
                <label class="border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-red-300 has-[:checked]:border-red-600 has-[:checked]:bg-red-50 transition">
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
                     class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500"
                     placeholder="0712345678" value="{{ old('phone_number', auth()->user()->phone) }}">
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-6 py-4 rounded-xl font-semibold text-lg transition shadow-lg shadow-red-600/20">
              Confirm Booking & Pay
            </button>
          </form>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="lg:col-span-1 space-y-6 scroll-reveal">
        <div class="bg-black rounded-3xl p-6 text-white relative overflow-hidden">
          <div class="absolute inset-0 opacity-20"><div class="absolute top-0 right-0 w-32 h-32 bg-red-600 rounded-full blur-2xl"></div></div>
          <div class="relative">
            <h3 class="font-bold text-lg mb-3">Session Info</h3>
            <ul class="space-y-3 text-sm text-gray-300">
              <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span>100% Private & Confidential</span></li>
              <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span>Professional Certified Coaches</span></li>
              <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span>Flexible Scheduling</span></li>
              <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span>Secure Payments</span></li>
              <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944"/></svg><span>Instant Confirmation</span></li>
            </ul>
          </div>
        </div>
        <video class="w-full rounded-2xl shadow-lg object-cover aspect-video" muted loop autoplay playsinline preload="metadata">
          <source src="{{ asset('videos/VID-20260528-WA0023.mp4') }}" type="video/mp4">
        </video>
        <img src="{{ asset('images/IMG-20260528-WA0011.jpg') }}" alt="MIBI Coaching" class="w-full rounded-2xl shadow-lg object-cover aspect-[4/3]">
      </div>
    </div>
    @else
    <div class="text-center py-16 scroll-reveal">
      <div class="max-w-md mx-auto">
        <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
          <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Please Sign In</h2>
        <p class="text-gray-600 mb-8">You need to be logged in to book a session. Don't have an account? Register in minutes.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <a href="{{ route('login') }}" class="bg-red-600 text-white px-8 py-3.5 rounded-xl font-semibold hover:bg-red-700 transition shadow-lg shadow-red-600/20">Sign In</a>
          <a href="{{ route('register') }}" class="border-2 border-gray-200 text-gray-700 px-8 py-3.5 rounded-xl font-semibold hover:border-gray-300 transition">Create Account</a>
        </div>
      </div>
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
<script>
function revealOnScroll(){var e=document.querySelectorAll('.scroll-reveal'),t=window.innerHeight;e.forEach(function(e){e.getBoundingClientRect().top<t-60&&e.classList.add('revealed')})}document.addEventListener('scroll',revealOnScroll);document.addEventListener('DOMContentLoaded',revealOnScroll);
</script>
@endpush
@endsection
