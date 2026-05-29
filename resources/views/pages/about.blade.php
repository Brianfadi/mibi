@extends('layouts.app')

@section('title', 'About MIBI — Where Love Faces Reality')
@section('meta_description', 'MIBI (Make It or Break It) is a modern relationship growth and emotional wellness platform. Learn about our mission, vision, values, and purpose.')

@section('content')
<!-- ======================== -->
<!-- HERO -->
<!-- ======================== -->
<section class="relative bg-gradient-to-br from-black via-gray-900 to-red-900 text-white py-28 overflow-hidden">
  <div class="absolute inset-0 opacity-10">
    <img src="{{ asset('images/IMG-20260528-WA0015.jpg') }}" alt="" class="w-full h-full object-cover">
  </div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <div class="scroll-reveal">
      <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">About MIBI</span>
      <h1 class="text-4xl md:text-6xl font-bold mt-4 mb-6">Make It or Break It</h1>
      <p class="text-xl md:text-2xl text-gray-300 font-light max-w-3xl mx-auto">Where Love Faces Reality ❤️</p>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- WHO WE ARE -->
<!-- ======================== -->
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12 items-center mb-16">
      <div class="scroll-reveal">
        <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Who We Are</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-3 mb-6">MIBI is a Modern Relationship Growth &amp; Emotional Wellness Platform</h2>
        <div class="prose prose-lg text-gray-600 max-w-none space-y-4">
          <p>MIBI (Make It or Break It) is dedicated to helping individuals understand relationships, heal emotionally, make wise decisions, and build healthier connections.</p>
          <p>In today's world, relationships have become one of the biggest influences on people's emotional, mental, and social well-being. Many individuals struggle silently with heartbreak, toxic relationships, betrayal, communication problems, emotional confusion, loneliness, and difficult life decisions.</p>
          <p>MIBI was created to become a safe and supportive platform where people can learn, heal, grow, and gain clarity about relationships and life.</p>
          <p>We believe relationships should not destroy a person's peace, confidence, or future. Instead, healthy relationships should promote growth, emotional stability, support, understanding, and purpose.</p>
        </div>
      </div>
      <div class="scroll-reveal">
        <img src="{{ asset('images/IMG-20260528-WA0014.jpg') }}" alt="MIBI — emotional wellness and relationship coaching" class="w-full rounded-2xl shadow-lg object-cover aspect-[4/3]">
      </div>
    </div>
    <div class="scroll-reveal max-w-4xl mx-auto">
      <div class="bg-gray-50 border-l-4 border-red-600 rounded-r-2xl p-8">
        <p class="text-lg text-gray-700 leading-relaxed italic">"At MIBI, we create honest conversations about love, heartbreak, communication, trust, emotional healing, self-worth, and personal growth — helping people face the realities of relationships with wisdom and maturity."</p>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- IMAGE CARDS GALLERY -->
<!-- ======================== -->
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid md:grid-cols-3 gap-6">
      <div class="scroll-reveal relative rounded-2xl overflow-hidden shadow-lg group h-[28rem] md:h-[32rem]">
        <img src="{{ asset('images/IMG-20260528-WA0017.jpg') }}" alt="" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-6">
          <span class="text-red-400 text-sm font-semibold uppercase tracking-wider">Healing</span>
          <h3 class="text-white text-xl font-bold mt-1">Find Your Peace</h3>
        </div>
      </div>
      <div class="scroll-reveal relative rounded-2xl overflow-hidden shadow-lg group h-[28rem] md:h-[32rem]">
        <img src="{{ asset('images/IMG-20260528-WA0018.jpg') }}" alt="" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-6">
          <span class="text-red-400 text-sm font-semibold uppercase tracking-wider">Growth</span>
          <h3 class="text-white text-xl font-bold mt-1">Build Your Future</h3>
        </div>
      </div>
      <div class="scroll-reveal relative rounded-2xl overflow-hidden shadow-lg group h-[28rem] md:h-[32rem]">
        <div class="relative rounded-2xl overflow-hidden shadow-lg group cursor-pointer h-full" onclick="this.querySelector('video')?.play()">
          <video muted loop playsinline poster="{{ asset('images/IMG-20260528-WA0019.jpg') }}" class="w-full h-full object-cover">
            <source src="{{ asset('videos/VID-20260528-WA0023.mp4') }}" type="video/mp4">
          </video>
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
          <div class="absolute bottom-0 left-0 right-0 p-6">
            <span class="text-red-400 text-sm font-semibold uppercase tracking-wider">Watch</span>
            <h3 class="text-white text-xl font-bold mt-1">The MIBI Experience</h3>
          </div>
          <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-16 h-16 bg-red-600/90 rounded-full flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition">
            <svg class="w-7 h-7 text-white ml-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- WHY MIBI -->
<!-- ======================== -->
<section class="py-24 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
      <div class="scroll-reveal order-2 lg:order-1">
        <img src="{{ asset('images/IMG-20260528-WA0016.jpg') }}" alt="Relationships can build or break a person" class="w-full rounded-2xl shadow-lg object-cover aspect-[4/3]">
      </div>
      <div class="scroll-reveal order-1 lg:order-2">
        <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Why MIBI</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-3 mb-6">Relationships Can Either Build or Break a Person</h2>
        <div class="prose prose-lg text-gray-600 max-w-none space-y-4">
          <p>Many people enter relationships without understanding emotional responsibility, communication, trust, boundaries, self-worth, emotional intelligence, and healthy conflict resolution.</p>
          <p>As a result, many people experience emotional pain, stress and anxiety, toxic relationships, betrayal and heartbreak, depression and loneliness, poor decision-making, and loss of confidence and self-esteem.</p>
          <p>MIBI was created to bridge this gap by providing relationship education, emotional healing support, personal growth guidance, safe discussions, coaching and mentorship, and community support.</p>
        </div>
      </div>
    </div>
    <div class="scroll-reveal mt-12">
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-white rounded-xl p-5 border border-gray-200 text-center">
          <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-xl">📚</span></div>
          <h4 class="font-semibold text-gray-900">Relationship Education</h4>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-200 text-center">
          <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-xl">💚</span></div>
          <h4 class="font-semibold text-gray-900">Emotional Healing Support</h4>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-200 text-center">
          <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-xl">🌱</span></div>
          <h4 class="font-semibold text-gray-900">Personal Growth Guidance</h4>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-200 text-center">
          <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-xl">💬</span></div>
          <h4 class="font-semibold text-gray-900">Safe Discussions</h4>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-200 text-center">
          <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-xl">🎯</span></div>
          <h4 class="font-semibold text-gray-900">Coaching &amp; Mentorship</h4>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-200 text-center">
          <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-xl">🤝</span></div>
          <h4 class="font-semibold text-gray-900">Community Support</h4>
        </div>
      </div>
    </div>
    <div class="scroll-reveal mt-10 text-center">
      <p class="text-lg text-gray-600 max-w-3xl mx-auto">MIBI is not about judging people or promoting negativity about relationships. It is about helping people understand reality, think wisely, grow emotionally, and create healthier connections.</p>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- MISSION & VISION -->
<!-- ======================== -->
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid md:grid-cols-2 gap-8">
      <div class="scroll-reveal bg-black text-white rounded-3xl p-10 lg:p-12 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-red-600 opacity-20 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        <div class="relative">
          <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">Our Mission</span>
          <h2 class="text-3xl font-bold mt-3 mb-6">Mission</h2>
          <p class="text-gray-300 text-lg leading-relaxed">To empower individuals with relationship knowledge, emotional healing, personal growth, and wise decision-making skills that help them build healthier, happier, and more meaningful relationships.</p>
          <p class="text-gray-400 mt-6">MIBI aims to create a generation of emotionally aware, mentally strong, and socially responsible individuals who understand the value of healthy communication, self-worth, emotional balance, and mature relationships.</p>
        </div>
      </div>
      <div class="scroll-reveal bg-gradient-to-br from-red-50 to-red-100 rounded-3xl p-10 lg:p-12 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-red-600 opacity-10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        <div class="relative">
          <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Our Vision</span>
          <h2 class="text-3xl font-bold text-gray-900 mt-3 mb-6">Vision</h2>
          <p class="text-gray-700 text-lg leading-relaxed">To become a leading global relationship and emotional wellness platform that transforms lives through education, healing, coaching, mentorship, and meaningful conversations.</p>
          <ul class="mt-6 space-y-3">
            <li class="flex items-start space-x-3 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Understand themselves better</span></li>
            <li class="flex items-start space-x-3 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Build healthier relationships</span></li>
            <li class="flex items-start space-x-3 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Heal emotionally</span></li>
            <li class="flex items-start space-x-3 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Communicate effectively</span></li>
            <li class="flex items-start space-x-3 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Make wise emotional decisions</span></li>
            <li class="flex items-start space-x-3 text-gray-700"><svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>Grow mentally, emotionally, and socially</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- CORE VALUES -->
<!-- ======================== -->
<section class="py-24 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="scroll-reveal text-center mb-14">
      <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Our Foundation</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-3">Our Core Values</h2>
      <p class="text-gray-600 text-lg mt-4 max-w-2xl mx-auto">These values guide everything we do at MIBI.</p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="scroll-reveal bg-white rounded-2xl p-8 border border-gray-200 service-card hover:shadow-xl">
        <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">🔍</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Truth &amp; Honesty</h3>
        <p class="text-gray-600">We believe in honest conversations about relationships, emotions, healing, and personal growth.</p>
      </div>
      <div class="scroll-reveal bg-white rounded-2xl p-8 border border-gray-200 service-card hover:shadow-xl">
        <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">🤝</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Respect</h3>
        <p class="text-gray-600">We treat every individual with dignity, empathy, confidentiality, and understanding regardless of their relationship experiences.</p>
      </div>
      <div class="scroll-reveal bg-white rounded-2xl p-8 border border-gray-200 service-card hover:shadow-xl">
        <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">💚</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Emotional Healing</h3>
        <p class="text-gray-600">We promote emotional wellness, inner peace, healing, and self-recovery after painful experiences.</p>
      </div>
      <div class="scroll-reveal bg-white rounded-2xl p-8 border border-gray-200 service-card hover:shadow-xl">
        <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">🌱</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Growth &amp; Self-Development</h3>
        <p class="text-gray-600">We encourage individuals to become wiser, stronger, emotionally mature, and more self-aware.</p>
      </div>
      <div class="scroll-reveal bg-white rounded-2xl p-8 border border-gray-200 service-card hover:shadow-xl">
        <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">💡</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Wisdom &amp; Responsibility</h3>
        <p class="text-gray-600">We promote wise decision-making, emotional responsibility, and healthy relationship choices.</p>
      </div>
      <div class="scroll-reveal bg-white rounded-2xl p-8 border border-gray-200 service-card hover:shadow-xl">
        <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">🌍</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Community &amp; Support</h3>
        <p class="text-gray-600">We believe healing and growth become easier in a supportive and positive environment.</p>
      </div>
      <div class="scroll-reveal bg-white rounded-2xl p-8 border border-gray-200 service-card hover:shadow-xl lg:col-span-3 max-w-2xl mx-auto">
        <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">🎯</span></div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Reality</h3>
        <p class="text-gray-600">We encourage people to face the realities of relationships honestly rather than living in denial, confusion, or unhealthy emotional dependence.</p>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- VIDEO + IMAGE CARDS -->
<!-- ======================== -->
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-8 items-center">
      <div class="scroll-reveal relative rounded-2xl overflow-hidden shadow-xl group h-96 md:h-[30rem]">
        <video muted loop playsinline poster="{{ asset('images/IMG-20260528-WA0016.jpg') }}" class="w-full h-full object-cover">
          <source src="{{ asset('videos/VID-20260528-WA0020.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
          <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center shadow-xl">
            <svg class="w-7 h-7 text-white ml-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
          </div>
        </div>
      </div>
      <div class="scroll-reveal space-y-6">
        <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">See MIBI In Action</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Watch What We Do</h2>
        <p class="text-gray-600 text-lg">Get a glimpse of the coaching sessions, the conversations, and the transformations that happen at MIBI every day.</p>
        <div class="grid grid-cols-2 gap-4">
          <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 text-center">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mx-auto mb-2"><span class="text-lg">🎥</span></div>
            <h4 class="font-semibold text-gray-900 text-sm">Coaching Sessions</h4>
          </div>
          <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 text-center">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mx-auto mb-2"><span class="text-lg">💬</span></div>
            <h4 class="font-semibold text-gray-900 text-sm">Real Conversations</h4>
          </div>
          <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 text-center">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mx-auto mb-2"><span class="text-lg">❤️</span></div>
            <h4 class="font-semibold text-gray-900 text-sm">Healing Moments</h4>
          </div>
          <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 text-center">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mx-auto mb-2"><span class="text-lg">🌱</span></div>
            <h4 class="font-semibold text-gray-900 text-sm">Life Transformation</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- WHAT MIBI STANDS FOR -->
<!-- ======================== -->
<section class="py-24 bg-black text-white relative overflow-hidden">
  <div class="absolute inset-0 opacity-5">
    <img src="{{ asset('images/IMG-20260528-WA0012.jpg') }}" alt="" class="w-full h-full object-cover">
  </div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="scroll-reveal text-center mb-14">
      <span class="text-red-400 font-semibold text-sm uppercase tracking-widest">What MIBI Stands For</span>
      <h2 class="text-3xl md:text-4xl font-bold mt-3 mb-4">Make It or Break It</h2>
      <p class="text-xl text-gray-400">Where Love Faces Reality</p>
    </div>

    <div class="scroll-reveal max-w-4xl mx-auto mb-14">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
        <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 border border-white/10">
          <span class="text-3xl block mb-2">🔍</span>
          <span class="text-gray-300 font-medium text-sm">Truth</span>
        </div>
        <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 border border-white/10">
          <span class="text-3xl block mb-2">💚</span>
          <span class="text-gray-300 font-medium text-sm">Healing</span>
        </div>
        <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 border border-white/10">
          <span class="text-3xl block mb-2">🌱</span>
          <span class="text-gray-300 font-medium text-sm">Growth</span>
        </div>
        <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 border border-white/10">
          <span class="text-3xl block mb-2">💡</span>
          <span class="text-gray-300 font-medium text-sm">Wisdom</span>
        </div>
        <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 border border-white/10">
          <span class="text-3xl block mb-2">🧠</span>
          <span class="text-gray-300 font-medium text-sm">Emotional Awareness</span>
        </div>
        <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 border border-white/10">
          <span class="text-3xl block mb-2">❤️</span>
          <span class="text-gray-300 font-medium text-sm">Healthy Relationships</span>
        </div>
        <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 border border-white/10">
          <span class="text-3xl block mb-2">💎</span>
          <span class="text-gray-300 font-medium text-sm">Self-Worth</span>
        </div>
        <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 border border-white/10">
          <span class="text-3xl block mb-2">🔄</span>
          <span class="text-gray-300 font-medium text-sm">Personal Transformation</span>
        </div>
      </div>
    </div>

    <div class="scroll-reveal grid md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-5xl mx-auto">
      <div class="text-center p-6">
        <div class="w-16 h-16 bg-red-600/20 rounded-2xl flex items-center justify-center mx-auto mb-4"><span class="text-2xl">🏥</span></div>
        <h4 class="font-semibold text-white mb-2">A Healing Platform</h4>
      </div>
      <div class="text-center p-6">
        <div class="w-16 h-16 bg-red-600/20 rounded-2xl flex items-center justify-center mx-auto mb-4"><span class="text-2xl">📖</span></div>
        <h4 class="font-semibold text-white mb-2">A Learning Platform</h4>
      </div>
      <div class="text-center p-6">
        <div class="w-16 h-16 bg-red-600/20 rounded-2xl flex items-center justify-center mx-auto mb-4"><span class="text-2xl">🤝</span></div>
        <h4 class="font-semibold text-white mb-2">A Support Community</h4>
      </div>
      <div class="text-center p-6">
        <div class="w-16 h-16 bg-red-600/20 rounded-2xl flex items-center justify-center mx-auto mb-4"><span class="text-2xl">🎯</span></div>
        <h4 class="font-semibold text-white mb-2">A Coaching &amp; Mentorship Space</h4>
      </div>
    </div>

    <div class="scroll-reveal mt-10 text-center">
      <div class="inline-block bg-red-600/10 border border-red-600/20 rounded-2xl p-8 max-w-3xl mx-auto">
        <p class="text-xl text-gray-300 leading-relaxed">A safe environment for emotional growth.</p>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- IMAGE CARDS STRIP -->
<!-- ======================== -->
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid md:grid-cols-4 gap-4">
      <div class="scroll-reveal relative rounded-xl overflow-hidden group h-64">
        <img src="{{ asset('images/IMG-20260528-WA0014.jpg') }}" alt="" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-4">
          <h4 class="text-white font-bold text-sm">Emotional Healing</h4>
          <p class="text-gray-300 text-xs">Find peace after pain</p>
        </div>
      </div>
      <div class="scroll-reveal relative rounded-xl overflow-hidden group h-64">
        <img src="{{ asset('images/IMG-20260528-WA0015.jpg') }}" alt="" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-4">
          <h4 class="text-white font-bold text-sm">Relationship Coaching</h4>
          <p class="text-gray-300 text-xs">Build stronger bonds</p>
        </div>
      </div>
      <div class="scroll-reveal relative rounded-xl overflow-hidden group h-64">
        <img src="{{ asset('images/IMG-20260528-WA0012.jpg') }}" alt="" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-4">
          <h4 class="text-white font-bold text-sm">Personal Growth</h4>
          <p class="text-gray-300 text-xs">Become your best self</p>
        </div>
      </div>
      <div class="scroll-reveal relative rounded-xl overflow-hidden group h-64">
        <div class="relative rounded-xl overflow-hidden group cursor-pointer h-full" onclick="this.querySelector('video')?.play()">
          <video muted loop playsinline poster="{{ asset('images/IMG-20260528-WA0011.jpg') }}" class="w-full h-full object-cover">
            <source src="{{ asset('videos/VID-20260528-WA0021.mp4') }}" type="video/mp4">
          </video>
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
          <div class="absolute bottom-0 left-0 right-0 p-4">
            <h4 class="text-white font-bold text-sm">Watch Stories</h4>
            <p class="text-gray-300 text-xs">Real transformations</p>
          </div>
          <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-12 h-12 bg-red-600/90 rounded-full flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition">
            <svg class="w-5 h-5 text-white ml-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- WHAT WE HELP WITH -->
<!-- ======================== -->
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="scroll-reveal text-center mb-14">
      <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">How We Help</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-3">What MIBI Helps Individuals With</h2>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 max-w-5xl mx-auto">
      <div class="scroll-reveal bg-gray-50 rounded-xl p-4 text-center border border-gray-200"><span class="text-2xl block mb-2">💞</span><span class="text-gray-700 font-medium">Understand relationships deeply</span></div>
      <div class="scroll-reveal bg-gray-50 rounded-xl p-4 text-center border border-gray-200"><span class="text-2xl block mb-2">💚</span><span class="text-gray-700 font-medium">Heal emotionally</span></div>
      <div class="scroll-reveal bg-gray-50 rounded-xl p-4 text-center border border-gray-200"><span class="text-2xl block mb-2">🧠</span><span class="text-gray-700 font-medium">Make wise relationship decisions</span></div>
      <div class="scroll-reveal bg-gray-50 rounded-xl p-4 text-center border border-gray-200"><span class="text-2xl block mb-2">💎</span><span class="text-gray-700 font-medium">Build confidence and self-worth</span></div>
      <div class="scroll-reveal bg-gray-50 rounded-xl p-4 text-center border border-gray-200"><span class="text-2xl block mb-2">💬</span><span class="text-gray-700 font-medium">Improve communication</span></div>
      <div class="scroll-reveal bg-gray-50 rounded-xl p-4 text-center border border-gray-200"><span class="text-2xl block mb-2">🧩</span><span class="text-gray-700 font-medium">Develop emotional intelligence</span></div>
      <div class="scroll-reveal bg-gray-50 rounded-xl p-4 text-center border border-gray-200"><span class="text-2xl block mb-2">🤝</span><span class="text-gray-700 font-medium">Maintain healthier connections</span></div>
      <div class="scroll-reveal bg-gray-50 rounded-xl p-4 text-center border border-gray-200"><span class="text-2xl block mb-2">⚖️</span><span class="text-gray-700 font-medium">Know when to fight or walk away</span></div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- OUR PURPOSE -->
<!-- ======================== -->
<section class="py-24 bg-gray-50 relative overflow-hidden">
  <div class="absolute inset-0 opacity-[0.03]">
    <img src="{{ asset('images/IMG-20260528-WA0011.jpg') }}" alt="" class="w-full h-full object-cover">
  </div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="scroll-reveal text-center mb-14">
      <span class="text-red-600 font-semibold text-sm uppercase tracking-widest">Our Purpose</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-3">Why MIBI Exists</h2>
    </div>
    <div class="scroll-reveal max-w-4xl mx-auto text-center mb-12">
      <p class="text-xl text-gray-600 leading-relaxed">We believe every relationship experience carries a lesson. Some relationships are meant to build us, teach us, heal us, challenge us, and transform us.</p>
      <p class="text-lg text-gray-600 mt-6">Our purpose is to help people grow through those experiences instead of being destroyed by them.</p>
    </div>
    <div class="scroll-reveal max-w-3xl mx-auto">
      <div class="grid sm:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl p-8 border border-gray-200 service-card hover:shadow-xl">
          <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">❓</span></div>
          <h3 class="text-lg font-bold text-gray-900 mb-3">From Confusion</h3>
          <p class="text-4xl font-bold text-red-600">→</p>
          <p class="text-gray-600 mt-2 font-semibold">To Clarity</p>
        </div>
        <div class="bg-white rounded-2xl p-8 border border-gray-200 service-card hover:shadow-xl">
          <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">💔</span></div>
          <h3 class="text-lg font-bold text-gray-900 mb-3">From Pain</h3>
          <p class="text-4xl font-bold text-red-600">→</p>
          <p class="text-gray-600 mt-2 font-semibold">To Healing</p>
        </div>
        <div class="bg-white rounded-2xl p-8 border border-gray-200 service-card hover:shadow-xl">
          <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">😰</span></div>
          <h3 class="text-lg font-bold text-gray-900 mb-3">From Fear</h3>
          <p class="text-4xl font-bold text-red-600">→</p>
          <p class="text-gray-600 mt-2 font-semibold">To Confidence</p>
        </div>
        <div class="bg-white rounded-2xl p-8 border border-gray-200 service-card hover:shadow-xl">
          <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">🌀</span></div>
          <h3 class="text-lg font-bold text-gray-900 mb-3">From Emotional Weakness</h3>
          <p class="text-4xl font-bold text-red-600">→</p>
          <p class="text-gray-600 mt-2 font-semibold">To Emotional Strength</p>
        </div>
        <div class="bg-white rounded-2xl p-8 border border-gray-200 service-card hover:shadow-xl sm:col-span-2">
          <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center mb-5 service-icon"><span class="text-2xl">☠️</span></div>
          <h3 class="text-lg font-bold text-gray-900 mb-3">From Toxicity</h3>
          <p class="text-4xl font-bold text-red-600">→</p>
          <p class="text-gray-600 mt-2 font-semibold">To Healthy Living</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- FINAL IMAGE GALLERY -->
<!-- ======================== -->
<section class="py-16 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid md:grid-cols-2 gap-6">
      <div class="scroll-reveal relative rounded-2xl overflow-hidden shadow-xl group h-80 md:h-96">
        <img src="{{ asset('images/IMG-20260528-WA0019.jpg') }}" alt="" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-8">
          <span class="text-red-400 text-sm font-semibold uppercase tracking-wider">Healing Journey</span>
          <h3 class="text-white text-2xl font-bold mt-2">You Are Not Alone</h3>
          <p class="text-gray-300 text-sm mt-2">Every step you take brings you closer to the person you're meant to become.</p>
        </div>
      </div>
      <div class="scroll-reveal relative rounded-2xl overflow-hidden shadow-xl group h-80 md:h-96">
        <div class="relative rounded-2xl overflow-hidden shadow-xl group cursor-pointer h-full" onclick="this.querySelector('video')?.play()">
          <video muted loop playsinline poster="{{ asset('images/IMG-20260528-WA0018.jpg') }}" class="w-full h-full object-cover">
            <source src="{{ asset('videos/VID-20260528-WA0022.mp4') }}" type="video/mp4">
          </video>
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
          <div class="absolute bottom-0 left-0 right-0 p-8">
            <span class="text-red-400 text-sm font-semibold uppercase tracking-wider">Watch</span>
            <h3 class="text-white text-2xl font-bold mt-2">Start Your Transformation</h3>
            <p class="text-gray-300 text-sm mt-2">See how MIBI changes lives through coaching and community.</p>
          </div>
          <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-16 h-16 bg-red-600/90 rounded-full flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition">
            <svg class="w-7 h-7 text-white ml-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================== -->
<!-- CTA -->
<!-- ======================== -->
<section class="py-20 bg-gradient-to-br from-red-600 to-red-800 text-white">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <div class="scroll-reveal">
      <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Start Your Journey?</h2>
      <p class="text-xl text-red-100 mb-8 max-w-2xl mx-auto">Whether you're healing, growing, or seeking clarity — MIBI is here for you.</p>
      <div class="flex flex-wrap justify-center gap-4">
        <a href="{{ route('register') }}" class="inline-block bg-white text-red-600 font-semibold px-8 py-4 rounded-xl hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">Register with MIBI</a>
        <a href="{{ route('coaching') }}" class="inline-block border-2 border-white text-white font-semibold px-8 py-4 rounded-xl hover:bg-white hover:text-red-600 transition-all duration-300">Explore Coaching</a>
      </div>
    </div>
  </div>
</section>
@endsection
