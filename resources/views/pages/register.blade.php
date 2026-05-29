@extends('layouts.app')

@section('title', 'Register — Join MIBI')

@push('styles')
<style>
.text-gradient { background: linear-gradient(135deg,#fbbf24,#ef4444,#dc2626); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.form-section { transition: all 0.3s ease; }
.form-section:hover { border-color: #dc2626; }
.reveal { opacity: 0; transition: all 1s cubic-bezier(0.16, 1, 0.3, 1); }
.reveal-left { transform: translateX(-60px); }
.reveal-right { transform: translateX(60px); }
.reveal-up { transform: translateY(50px); }
.reveal-scale { transform: scale(0.9); }
.reveal.revealed { opacity: 1; transform: translateX(0) translateY(0) scale(1); }
.stagger-1 { transition-delay: 0.1s; }
.stagger-2 { transition-delay: 0.2s; }
.stagger-3 { transition-delay: 0.3s; }
.stagger-4 { transition-delay: 0.4s; }
</style>
@endpush

@section('content')
<!-- Hero -->
<section class="relative bg-black text-white py-28 overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ asset('images/IMG-20260528-WA0015.jpg') }}" alt="" class="w-full h-full object-cover opacity-25">
    <div class="absolute inset-0 bg-gradient-to-br from-black/80 via-gray-900/80 to-red-900/80"></div>
  </div>
  <div class="absolute inset-0 opacity-30">
    <div class="absolute top-10 left-10 w-80 h-80 bg-red-600 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-red-800 rounded-full blur-3xl"></div>
  </div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal reveal-up">
    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-red-600/30"><span class="text-white font-bold text-3xl">M</span></div>
    <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">Join MIBI — Make It or Break It</span>
    <h1 class="text-5xl md:text-7xl font-bold mt-4 mb-6 leading-tight">Begin Your <span class="text-gradient">Healing Journey</span></h1>
    <p class="text-gray-400 text-xl max-w-3xl mx-auto leading-relaxed">Where Love Faces Reality ❤️</p>
  </div>
</section>

<!-- Welcome -->
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
      <div class="reveal reveal-left">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Welcome to MIBI</h2>
        <p class="text-gray-600 text-lg leading-relaxed mb-6">Thank you for choosing to join <strong>MIBI</strong> (<strong>M</strong>ake <strong>I</strong>t or <strong>B</strong>reak <strong>I</strong>t) — a relationship growth, emotional healing, and personal development platform designed to help individuals:</p>
        <div class="grid grid-cols-2 gap-3 max-w-xl">
          <div class="flex items-center space-x-2 text-sm text-gray-700 bg-gray-50 rounded-xl p-3"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Understand relationships</span></div>
          <div class="flex items-center space-x-2 text-sm text-gray-700 bg-gray-50 rounded-xl p-3"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Make wise decisions</span></div>
          <div class="flex items-center space-x-2 text-sm text-gray-700 bg-gray-50 rounded-xl p-3"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Heal emotionally</span></div>
          <div class="flex items-center space-x-2 text-sm text-gray-700 bg-gray-50 rounded-xl p-3"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Build self-worth</span></div>
          <div class="flex items-center space-x-2 text-sm text-gray-700 bg-gray-50 rounded-xl p-3"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Improve communication</span></div>
          <div class="flex items-center space-x-2 text-sm text-gray-700 bg-gray-50 rounded-xl p-3"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Recover from heartbreak</span></div>
        </div>
        <p class="text-gray-500 text-sm mt-6 p-4 bg-yellow-50 rounded-xl border border-yellow-200">This registration form helps us understand your situation and recommend the best support program for you. All information provided will remain <strong>confidential</strong>.</p>
      </div>
      <div class="reveal reveal-right stagger-2">
        <video class="w-full rounded-3xl shadow-xl object-cover aspect-[4/3]" muted loop autoplay playsinline preload="metadata">
          <source src="{{ asset('videos/VID-20260528-WA0020.mp4') }}" type="video/mp4">
        </video>
      </div>
    </div>
  </div>
</section>

<!-- Steps -->
<section class="py-16 bg-gray-50">
  <div class="max-w-5xl mx-auto px-4">
    <div class="text-center mb-12 reveal reveal-up">
      <h2 class="text-3xl font-bold text-gray-900">Simple Registration Steps</h2>
      <p class="text-gray-600 mt-2">Four easy steps to begin your healing journey</p>
    </div>
    <div class="grid md:grid-cols-4 gap-4">
      <div class="reveal reveal-left stagger-1 bg-white rounded-2xl p-6 text-center border border-gray-200 hover:shadow-lg hover:border-red-200 transition-all"><div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-red-600 font-bold text-lg">1</span></div><h3 class="font-bold text-gray-900 text-sm">Complete Form</h3><p class="text-gray-500 text-xs mt-1">Provide your details & needs</p></div>
      <div class="reveal reveal-up stagger-2 bg-white rounded-2xl p-6 text-center border border-gray-200 hover:shadow-lg hover:border-red-200 transition-all"><div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-red-600 font-bold text-lg">2</span></div><h3 class="font-bold text-gray-900 text-sm">Choose Program</h3><p class="text-gray-500 text-xs mt-1">Pick the best fit for you</p></div>
      <div class="reveal reveal-up stagger-3 bg-white rounded-2xl p-6 text-center border border-gray-200 hover:shadow-lg hover:border-red-200 transition-all"><div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-red-600 font-bold text-lg">3</span></div><h3 class="font-bold text-gray-900 text-sm">Select Preferences</h3><p class="text-gray-500 text-xs mt-1">Session format & communication</p></div>
      <div class="reveal reveal-right stagger-4 bg-white rounded-2xl p-6 text-center border border-gray-200 hover:shadow-lg hover:border-red-200 transition-all"><div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-red-600 font-bold text-lg">4</span></div><h3 class="font-bold text-gray-900 text-sm">Submit</h3><p class="text-gray-500 text-xs mt-1">We'll contact you with next steps</p></div>
    </div>
    <div class="mt-8 reveal reveal-scale">
      <img src="{{ asset('images/IMG-20260528-WA0012.jpg') }}" alt="MIBI registration journey" class="w-full max-w-3xl mx-auto rounded-2xl shadow-lg object-cover aspect-[3/1]">
    </div>
  </div>
</section>

<!-- Registration Form -->
<section class="py-16 bg-white">
  <div class="max-w-5xl mx-auto px-4">
    <div class="grid lg:grid-cols-3 gap-8">
      <!-- Form -->
      <div class="lg:col-span-2">
        <form action="{{ route('register.submit') }}" method="POST" class="space-y-10">
          @csrf

          <!-- Section 1: Personal Information -->
          <div class="reveal reveal-left form-section bg-white rounded-3xl p-8 border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center"><span class="w-8 h-8 bg-red-600 text-white rounded-lg flex items-center justify-center text-sm font-bold mr-3">1</span> Personal Information</h2>
            <div class="grid md:grid-cols-2 gap-5">
              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                <input type="text" name="full_name" value="{{ old('full_name') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent @error('full_name') border-red-500 @enderror">
                @error('full_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Age *</label>
                <input type="number" name="age" value="{{ old('age') }}" required min="1" max="150" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent @error('age') border-red-500 @enderror">
                @error('age') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gender *</label>
                <select name="gender" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent @error('gender') border-red-500 @enderror">
                  <option value="">Select...</option>
                  <option value="male" {{ old('gender')=='male' ? 'selected' : '' }}>Male</option>
                  <option value="female" {{ old('gender')=='female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Country *</label>
                <input type="text" name="country" value="{{ old('country') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent @error('country') border-red-500 @enderror">
                @error('country') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">City/Town *</label>
                <input type="text" name="city" value="{{ old('city') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent @error('city') border-red-500 @enderror">
                @error('city') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nationality</label>
                <input type="text" name="nationality" value="{{ old('nationality') }}" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone/WhatsApp *</label>
                <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="+254..." class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent @error('phone') border-red-500 @enderror">
                @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent @error('email') border-red-500 @enderror">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Occupation/Profession</label>
                <input type="text" name="occupation" value="{{ old('occupation') }}" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent">
              </div>
            </div>
          </div>

          <!-- Section 2: Relationship Background -->
          <div class="reveal reveal-right form-section bg-white rounded-3xl p-8 border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center"><span class="w-8 h-8 bg-red-600 text-white rounded-lg flex items-center justify-center text-sm font-bold mr-3">2</span> Relationship Background</h2>
            <div class="space-y-5">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Relationship Status *</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                  @foreach(['Single','Dating','In a Relationship','Engaged','Married','Separated','Recovering from Breakup','Complicated Situation'] as $opt)
                  <label class="flex items-center space-x-2 p-3 border border-gray-200 rounded-xl hover:border-red-300 cursor-pointer transition-all {{ old('relationship_status')==$opt ? 'border-red-500 bg-red-50' : '' }}">
                    <input type="radio" name="relationship_status" value="{{ $opt }}" {{ old('relationship_status')==$opt ? 'checked' : '' }} required class="text-red-600 focus:ring-red-500">
                    <span class="text-sm text-gray-700">{{ $opt }}</span>
                  </label>
                  @endforeach
                </div>
                @error('relationship_status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">How long was/is the relationship?</label>
                <div class="flex flex-wrap gap-3">
                  @foreach(['Less than 6 months','1 year','2-3 years','4-5 years','More than 5 years'] as $opt)
                  <label class="flex items-center space-x-2 p-3 border border-gray-200 rounded-xl hover:border-red-300 cursor-pointer transition-all {{ old('relationship_length')==$opt ? 'border-red-500 bg-red-50' : '' }}">
                    <input type="radio" name="relationship_length" value="{{ $opt }}" {{ old('relationship_length')==$opt ? 'checked' : '' }} class="text-red-600 focus:ring-red-500">
                    <span class="text-sm text-gray-700">{{ $opt }}</span>
                  </label>
                  @endforeach
                </div>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">What challenge are you currently facing? *</label>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                  @foreach(['Heartbreak','Betrayal/Cheating','Communication Problems','Trust Issues','Emotional Abuse','Toxic Relationship','Lack of Commitment','Long Distance Relationship Issues','Marriage Problems','Low Self-Esteem','Depression/Emotional Stress','Difficulty Moving On','Relationship Confusion','Family Pressure','Other'] as $opt)
                  <label class="flex items-center space-x-2 p-3 border border-gray-200 rounded-xl hover:border-red-300 cursor-pointer transition-all {{ old('challenge_type')==$opt ? 'border-red-500 bg-red-50' : '' }}">
                    <input type="radio" name="challenge_type" value="{{ $opt }}" {{ old('challenge_type')==$opt ? 'checked' : '' }} required class="text-red-600 focus:ring-red-500">
                    <span class="text-sm text-gray-700">{{ $opt }}</span>
                  </label>
                  @endforeach
                </div>
                @error('challenge_type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Briefly explain your situation</label>
                <textarea name="challenge_explanation" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent resize-none">{{ old('challenge_explanation') }}</textarea>
              </div>
            </div>
          </div>

          <!-- Section 3: Emotional & Mental Well-being -->
          <div class="reveal reveal-left form-section bg-white rounded-3xl p-8 border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center"><span class="w-8 h-8 bg-red-600 text-white rounded-lg flex items-center justify-center text-sm font-bold mr-3">3</span> Emotional & Mental Well-being</h2>
            <div class="space-y-5">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">How has this situation affected you emotionally? (Select all that apply)</label>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                  @foreach(['Stress','Anxiety','Sleeplessness','Depression','Anger','Emotional Confusion','Loneliness','Loss of Confidence','Overthinking','Difficulty Concentrating'] as $opt)
                  <label class="flex items-center space-x-2 p-3 border border-gray-200 rounded-xl hover:border-red-300 cursor-pointer transition-all">
                    <input type="checkbox" name="emotional_effects[]" value="{{ $opt }}" {{ in_array($opt, old('emotional_effects', [])) ? 'checked' : '' }} class="text-red-600 focus:ring-red-500 rounded">
                    <span class="text-sm text-gray-700">{{ $opt }}</span>
                  </label>
                  @endforeach
                </div>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Have you spoken to anyone about your situation before?</label>
                <div class="flex gap-4">
                  <label class="flex items-center space-x-2 p-3 border border-gray-200 rounded-xl hover:border-red-300 cursor-pointer">
                    <input type="radio" name="has_spoken_to_someone" value="1" {{ old('has_spoken_to_someone')=='1' ? 'checked' : '' }} class="text-red-600 focus:ring-red-500">
                    <span class="text-sm text-gray-700">Yes</span>
                  </label>
                  <label class="flex items-center space-x-2 p-3 border border-gray-200 rounded-xl hover:border-red-300 cursor-pointer">
                    <input type="radio" name="has_spoken_to_someone" value="0" {{ old('has_spoken_to_someone')=='0' ? 'checked' : '' }} class="text-red-600 focus:ring-red-500">
                    <span class="text-sm text-gray-700">No</span>
                  </label>
                </div>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">What kind of support are you hoping to receive from MIBI?</label>
                <textarea name="support_hoping_for" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent resize-none">{{ old('support_hoping_for') }}</textarea>
              </div>
            </div>
          </div>

          <!-- Section 4: Program Options -->
          <div class="reveal reveal-right form-section bg-white rounded-3xl p-8 border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center"><span class="w-8 h-8 bg-red-600 text-white rounded-lg flex items-center justify-center text-sm font-bold mr-3">4</span> Program Options</h2>
            <div class="space-y-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Which sessions are you interested in? (Select all that apply)</label>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                  @foreach(['Weekly support sessions','Emotional guidance','Relationship advice','Access to MIBI support group','Motivation & healing exercises'] as $opt)
                  <label class="flex items-center space-x-2 p-3 border border-gray-200 rounded-xl hover:border-red-300 cursor-pointer transition-all">
                    <input type="checkbox" name="interested_sessions[]" value="{{ $opt }}" {{ in_array($opt, old('interested_sessions', [])) ? 'checked' : '' }} class="text-red-600 focus:ring-red-500 rounded">
                    <span class="text-sm text-gray-700">{{ $opt }}</span>
                  </label>
                  @endforeach
                </div>
              </div>

              <!-- Pricing Cards -->
              <div class="bg-gray-50 rounded-2xl p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Session Rates</h3>
                <div class="grid md:grid-cols-5 gap-3">
                  <div class="bg-white rounded-xl p-4 border border-gray-200 text-center hover:shadow-md transition-all"><span class="text-2xl">❤️</span><h4 class="font-bold text-sm mt-2">Introduction</h4><p class="text-xs text-gray-500">30 min</p><p class="text-red-600 font-bold mt-1">KES 1,000</p></div>
                  <div class="bg-white rounded-xl p-4 border border-gray-200 text-center hover:shadow-md transition-all"><span class="text-2xl">❤️</span><h4 class="font-bold text-sm mt-2">Standard</h4><p class="text-xs text-gray-500">1 hour</p><p class="text-red-600 font-bold mt-1">KES 2,500</p></div>
                  <div class="bg-white rounded-xl p-4 border border-gray-200 text-center hover:shadow-md transition-all"><span class="text-2xl">❤️</span><h4 class="font-bold text-sm mt-2">Intensive</h4><p class="text-xs text-gray-500">2 hours</p><p class="text-red-600 font-bold mt-1">KES 4,500</p></div>
                  <div class="bg-white rounded-xl p-4 border-2 border-red-200 text-center relative hover:shadow-md transition-all"><span class="absolute -top-2 -right-2 bg-red-600 text-white text-[10px] px-2 py-0.5 rounded-full">Popular</span><span class="text-2xl">❤️</span><h4 class="font-bold text-sm mt-2">Weekly Package</h4><p class="text-xs text-gray-500">4 sessions</p><p class="text-red-600 font-bold mt-1">KES 8,500</p></div>
                  <div class="bg-white rounded-xl p-4 border border-gray-200 text-center hover:shadow-md transition-all"><span class="text-2xl">❤️</span><h4 class="font-bold text-sm mt-2">Couples</h4><p class="text-xs text-gray-500">1.5 hours</p><p class="text-red-600 font-bold mt-1">KES 5,000</p></div>
                </div>
                <p class="text-xs text-gray-400 mt-3">Available via: Voice Call · Video Call · M-Pesa · PayPal · Bank Transfer</p>
              </div>

              <!-- Program Selection -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Which program would you like to join?</label>
                <div class="grid md:grid-cols-3 gap-4">
                  <label class="block p-5 border border-gray-200 rounded-2xl hover:border-red-300 cursor-pointer transition-all {{ old('selected_program')=='1 Month Recovery Starter' ? 'border-red-500 bg-red-50' : '' }}">
                    <input type="radio" name="selected_program" value="1 Month Recovery Starter" {{ old('selected_program')=='1 Month Recovery Starter' ? 'checked' : '' }} class="text-red-600 focus:ring-red-500">
                    <h4 class="font-bold text-gray-900 mt-2">1 Month — Recovery Starter</h4>
                    <p class="text-xs text-gray-500 mt-1">Basic emotional support & guidance<br><span class="text-red-600 font-semibold">KES 8,500 / $75</span></p>
                  </label>
                  <label class="block p-5 border border-gray-200 rounded-2xl hover:border-red-300 cursor-pointer transition-all {{ old('selected_program')=='3 Months Healing & Growth' ? 'border-red-500 bg-red-50' : '' }} relative">
                    <span class="absolute -top-2 -right-2 bg-gradient-to-r from-red-600 to-red-700 text-white text-[10px] px-2 py-0.5 rounded-full">Recommended</span>
                    <input type="radio" name="selected_program" value="3 Months Healing & Growth" {{ old('selected_program')=='3 Months Healing & Growth' ? 'checked' : '' }} class="text-red-600 focus:ring-red-500">
                    <h4 class="font-bold text-gray-900 mt-2">3 Months — Healing & Growth</h4>
                    <p class="text-xs text-gray-500 mt-1">Personal growth coaching, confidence rebuilding, weekly check-ins<br><span class="text-red-600 font-semibold">KES 15,000 / $130</span></p>
                  </label>
                  <label class="block p-5 border border-gray-200 rounded-2xl hover:border-red-300 cursor-pointer transition-all {{ old('selected_program')=='6 Months Full Transformation' ? 'border-red-500 bg-red-50' : '' }}">
                    <input type="radio" name="selected_program" value="6 Months Full Transformation" {{ old('selected_program')=='6 Months Full Transformation' ? 'checked' : '' }} class="text-red-600 focus:ring-red-500">
                    <h4 class="font-bold text-gray-900 mt-2">6 Months — Full Transformation</h4>
                    <p class="text-xs text-gray-500 mt-1">One-on-one mentorship, emotional intelligence training, lifestyle rebuilding<br><span class="text-red-600 font-semibold">KES 30,000 / $260</span></p>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <!-- Section 5: Session Preferences -->
          <div class="reveal reveal-left form-section bg-white rounded-3xl p-8 border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center"><span class="w-8 h-8 bg-red-600 text-white rounded-lg flex items-center justify-center text-sm font-bold mr-3">5</span> Session Preferences</h2>
            <div class="space-y-5">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Session Format</label>
                <div class="flex flex-wrap gap-3">
                  @foreach(['One-on-One Sessions','Group Sessions','Live Online Sessions','WhatsApp Support','Voice Calls'] as $opt)
                  <label class="flex items-center space-x-2 p-3 border border-gray-200 rounded-xl hover:border-red-300 cursor-pointer transition-all {{ old('preferred_session_format')==$opt ? 'border-red-500 bg-red-50' : '' }}">
                    <input type="radio" name="preferred_session_format" value="{{ $opt }}" {{ old('preferred_session_format')==$opt ? 'checked' : '' }} class="text-red-600 focus:ring-red-500">
                    <span class="text-sm text-gray-700">{{ $opt }}</span>
                  </label>
                  @endforeach
                </div>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Communication Method</label>
                <div class="flex flex-wrap gap-3">
                  @foreach(['WhatsApp','Email','Phone Calls','Telegram'] as $opt)
                  <label class="flex items-center space-x-2 p-3 border border-gray-200 rounded-xl hover:border-red-300 cursor-pointer transition-all {{ old('preferred_communication')==$opt ? 'border-red-500 bg-red-50' : '' }}">
                    <input type="radio" name="preferred_communication" value="{{ $opt }}" {{ old('preferred_communication')==$opt ? 'checked' : '' }} class="text-red-600 focus:ring-red-500">
                    <span class="text-sm text-gray-700">{{ $opt }}</span>
                  </label>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

          <!-- Section 6: Commitment -->
          <div class="reveal reveal-right form-section bg-white rounded-3xl p-8 border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center"><span class="w-8 h-8 bg-red-600 text-white rounded-lg flex items-center justify-center text-sm font-bold mr-3">6</span> Client Commitment</h2>
            <div class="space-y-5">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Are you willing to actively participate in your healing and growth process?</label>
                <div class="flex gap-4">
                  @foreach(['Yes','No','Maybe'] as $opt)
                  <label class="flex items-center space-x-2 p-3 border border-gray-200 rounded-xl hover:border-red-300 cursor-pointer transition-all {{ old('willing_to_participate')==$opt ? 'border-red-500 bg-red-50' : '' }}">
                    <input type="radio" name="willing_to_participate" value="{{ $opt }}" {{ old('willing_to_participate')==$opt ? 'checked' : '' }} class="text-red-600 focus:ring-red-500">
                    <span class="text-sm text-gray-700">{{ $opt }}</span>
                  </label>
                  @endforeach
                </div>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">What are your personal goals after joining MIBI?</label>
                <textarea name="personal_goals" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent resize-none" placeholder="e.g., I want to heal from my breakup, build my self-confidence, and learn to trust again...">{{ old('personal_goals') }}</textarea>
              </div>
            </div>
          </div>

          <!-- Section 7: Terms -->
          <div class="reveal reveal-up form-section bg-white rounded-3xl p-8 border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center"><span class="w-8 h-8 bg-red-600 text-white rounded-lg flex items-center justify-center text-sm font-bold mr-3">7</span> Terms & Confidentiality</h2>
            <div class="space-y-4">
              <label class="flex items-start space-x-3 p-4 bg-gray-50 rounded-xl cursor-pointer">
                <input type="checkbox" name="terms_accepted" value="1" {{ old('terms_accepted') ? 'checked' : '' }} required class="mt-1 text-red-600 focus:ring-red-500 rounded">
                <div>
                  <p class="text-sm text-gray-700">I understand that MIBI is a relationship guidance and emotional support platform intended for educational and personal growth purposes.</p>
                  <p class="text-sm text-gray-700 mt-2">I agree to maintain respectful communication during all sessions and interactions.</p>
                  <p class="text-sm text-gray-700 mt-2">I understand that all information shared will remain confidential unless safety concerns arise.</p>
                </div>
              </label>
              @error('terms_accepted') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
            </div>
          </div>

          <!-- Submit -->
          <div class="reveal reveal-up text-center">
            <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-12 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg shadow-red-600/30 hover:scale-105">
              Submit Your Registration
            </button>
            <p class="text-gray-500 text-sm mt-3">A MIBI representative will contact you shortly after reviewing your application.</p>
          </div>
        </form>
      </div>

      <!-- Sidebar -->
      <div class="lg:col-span-1 space-y-6">
        <div class="reveal reveal-right stagger-1 bg-black text-white rounded-3xl p-6 relative overflow-hidden sticky top-24">
          <div class="absolute inset-0 opacity-20"><div class="absolute top-0 right-0 w-32 h-32 bg-red-600 rounded-full blur-2xl"></div></div>
          <div class="relative">
            <h3 class="font-bold text-lg mb-4 flex items-center"><span class="text-red-400 mr-2">❤️</span> Why Join MIBI?</h3>
            <ul class="space-y-3 text-sm text-gray-300">
              <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>100% Private & Confidential</span></li>
              <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Professional Certified Coaches</span></li>
              <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Flexible Scheduling</span></li>
              <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Secure M-Pesa, PayPal & Bank Payments</span></li>
              <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Supportive Community</span></li>
              <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Global Access — Online & In-Person</span></li>
            </ul>
          </div>
        </div>
        <div class="reveal reveal-right stagger-3">
          <video class="w-full rounded-2xl shadow-lg object-cover aspect-video" muted loop autoplay playsinline preload="metadata">
            <source src="{{ asset('videos/VID-20260528-WA0023.mp4') }}" type="video/mp4">
          </video>
        </div>
        <div class="reveal reveal-right stagger-4">
          <img src="{{ asset('images/IMG-20260528-WA0014.jpg') }}" alt="MIBI emotional wellness" class="w-full rounded-2xl shadow-lg object-cover aspect-[4/3]">
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
var revealObserver = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
        if (entry.isIntersecting) {
            entry.target.classList.add('revealed');
        }
    });
}, { threshold: 0.1 });
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.reveal').forEach(function(el) { revealObserver.observe(el); });
});
</script>
@endpush
