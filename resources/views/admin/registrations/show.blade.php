@extends('layouts.admin')

@section('title', $registration->full_name)

@section('breadcrumb')
    <span class="mx-2">/</span>
    <a href="{{ route('admin.registrations.index') }}" class="hover:text-gray-600">Registrations</a>
    <span class="mx-2">/</span>
    <span class="text-gray-600">{{ $registration->full_name }}</span>
@endsection

@section('content')
<div class="w-full">
    <!-- Profile Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-2xl p-8 mb-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-red-600 rounded-full blur-3xl"></div>
        </div>
        <div class="relative flex flex-col sm:flex-row items-start sm:items-center gap-5">
            <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center text-white text-2xl font-bold shadow-lg shadow-red-600/30">
                {{ substr($registration->full_name, 0, 1) }}
            </div>
            <div class="flex-1">
                <h2 class="text-2xl font-bold text-white">{{ $registration->full_name }}</h2>
                <p class="text-gray-300 text-sm mt-1">Registered {{ $registration->created_at->diffForHumans() }} &middot; {{ $registration->created_at->format('M j, Y g:i A') }}</p>
                <div class="flex flex-wrap gap-2 mt-3">
                    <span class="px-3 py-1 rounded-full text-xs font-medium
                        @if($registration->status === 'pending') bg-yellow-500/20 text-yellow-300 border border-yellow-500/30
                        @elseif($registration->status === 'approved') bg-green-500/20 text-green-300 border border-green-500/30
                        @else bg-red-500/20 text-red-300 border border-red-500/30 @endif">
                        {{ ucfirst($registration->status) }}
                    </span>
                    @if($registration->approved_at)
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-white/10 text-gray-300 border border-white/10">
                            Approved {{ $registration->approved_at->format('M j, Y') }}
                        </span>
                    @endif
                    @if($registration->assignedCoach)
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-300 border border-blue-500/30">
                            Coach: {{ $registration->assignedCoach->name }}
                        </span>
                    @endif
                </div>
            </div>
            @if($registration->status === 'pending')
            <div class="flex gap-2">
                <button onclick="document.getElementById('approveForm').classList.toggle('hidden')" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition-all hover:scale-105 shadow-lg shadow-green-600/20">
                    Approve
                </button>
                <button onclick="if(confirm('Reject this registration?')) document.getElementById('rejectForm').submit()" class="bg-red-600/80 hover:bg-red-700 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition-all hover:scale-105">
                    Reject
                </button>
            </div>
            @endif
        </div>
    </div>

    <!-- Approved Banner -->
    @if($registration->status === 'approved')
    <div class="bg-gradient-to-r from-green-900/80 to-green-800/80 border border-green-500/30 rounded-2xl p-5 mb-6 flex items-center space-x-3">
        <div class="w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
        </div>
        <div>
            <p class="text-green-200 font-semibold text-sm">Approved &mdash; Credentials Sent</p>
            <p class="text-green-300/80 text-xs mt-0.5">Login credentials have been emailed to {{ $registration->email }}</p>
        </div>
    </div>
    @endif

    <!-- Approve Form -->
    <div id="approveForm" class="hidden bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl p-6 mb-6">
        <form action="{{ route('admin.registrations.approve', $registration) }}" method="POST" class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
            @csrf
            <div class="flex-1 w-full sm:w-auto">
                <label class="block text-xs font-semibold text-green-800 uppercase tracking-wider mb-1.5">Assign Coach (optional)</label>
                <select name="coach_id" class="w-full sm:w-64 border border-green-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 bg-white">
                    <option value="">No coach assigned</option>
                    @foreach($coaches as $coach)
                    <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-2 pt-5 sm:pt-0">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2.5 rounded-xl text-sm font-semibold transition-all hover:scale-105 shadow-lg shadow-green-600/20">
                    Approve &amp; Send Credentials
                </button>
                <button type="button" onclick="document.getElementById('approveForm').classList.add('hidden')" class="border border-gray-300 text-gray-600 px-4 py-2.5 rounded-xl text-sm hover:bg-gray-50 transition-all">
                    Cancel
                </button>
            </div>
        </form>
    </div>

    <form id="rejectForm" action="{{ route('admin.registrations.reject', $registration) }}" method="POST" class="hidden">@csrf</form>

    <!-- Content Grid -->
    <div class="grid md:grid-cols-2 gap-6">
        <!-- Personal Information -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center space-x-2 mb-5">
                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider">Personal Information</h3>
            </div>
            <dl class="space-y-3">
                @foreach([
                    ['Full Name', $registration->full_name, 'user'],
                    ['Age', $registration->age, 'calendar'],
                    ['Gender', ucfirst($registration->gender), 'users'],
                    ['Country', $registration->country, 'globe'],
                    ['City', $registration->city, 'location'],
                    ['Nationality', $registration->nationality ?? '—', 'flag'],
                    ['Phone', $registration->phone, 'phone'],
                    ['Email', $registration->email, 'mail'],
                    ['Occupation', $registration->occupation ?? '—', 'briefcase'],
                ] as [$label, $value, $icon])
                <div class="flex items-center justify-between text-sm py-1.5 border-b border-gray-50 last:border-0">
                    <dt class="flex items-center text-gray-500">
                        <svg class="w-3.5 h-3.5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if($icon === 'user')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            @elseif($icon === 'calendar')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            @elseif($icon === 'users')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            @elseif($icon === 'globe')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            @elseif($icon === 'location')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            @elseif($icon === 'flag')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
                            @elseif($icon === 'phone')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            @elseif($icon === 'mail')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            @elseif($icon === 'briefcase')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            @endif
                        </svg>
                        {{ $label }}
                    </dt>
                    <dd class="font-medium text-gray-900 text-right ml-4">{{ $value }}</dd>
                </div>
                @endforeach
            </dl>
        </div>

        <!-- Relationship Background -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center space-x-2 mb-5">
                <div class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-pink-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                </div>
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider">Relationship Background</h3>
            </div>
            <dl class="space-y-3">
                <div class="flex items-center justify-between text-sm py-1.5 border-b border-gray-50">
                    <dt class="text-gray-500">Status</dt>
                    <dd class="font-medium text-gray-900">{{ $registration->relationship_status }}</dd>
                </div>
                <div class="flex items-center justify-between text-sm py-1.5 border-b border-gray-50">
                    <dt class="text-gray-500">Duration</dt>
                    <dd class="font-medium text-gray-900">{{ $registration->relationship_length ?? '—' }}</dd>
                </div>
                <div class="flex items-center justify-between text-sm py-1.5 border-b border-gray-50">
                    <dt class="text-gray-500">Challenge Type</dt>
                    <dd><span class="bg-red-50 text-red-700 text-xs font-medium px-3 py-1 rounded-full">{{ $registration->challenge_type }}</span></dd>
                </div>
                @if($registration->challenge_explanation)
                <div class="text-sm pt-2">
                    <dt class="text-gray-500 mb-2 font-medium">Challenge Explanation</dt>
                    <dd class="text-gray-700 bg-gray-50 rounded-xl p-4 leading-relaxed text-sm">{{ $registration->challenge_explanation }}</dd>
                </div>
                @endif
            </dl>
        </div>

        <!-- Emotional & Well-being -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center space-x-2 mb-5">
                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider">Emotional &amp; Well-being</h3>
            </div>
            <dl class="space-y-3">
                @if($registration->emotional_effects)
                <div class="text-sm py-1.5">
                    <dt class="text-gray-500 mb-2">Emotional Effects</dt>
                    <dd class="flex flex-wrap gap-1.5">
                        @foreach((array) $registration->emotional_effects as $effect)
                            <span class="bg-purple-50 text-purple-700 text-xs px-3 py-1.5 rounded-full border border-purple-100">{{ $effect }}</span>
                        @endforeach
                    </dd>
                </div>
                @endif
                <div class="flex items-center justify-between text-sm py-1.5 border-b border-gray-50">
                    <dt class="text-gray-500">Has Spoken to Someone</dt>
                    <dd>
                        @if($registration->has_spoken_to_someone)
                            <span class="text-green-600 font-medium">Yes</span>
                        @else
                            <span class="text-gray-400">No</span>
                        @endif
                    </dd>
                </div>
                @if($registration->support_hoping_for)
                <div class="text-sm pt-2">
                    <dt class="text-gray-500 mb-2 font-medium">Support Hoping For</dt>
                    <dd class="text-gray-700 bg-gray-50 rounded-xl p-4 leading-relaxed text-sm">{{ $registration->support_hoping_for }}</dd>
                </div>
                @endif
            </dl>
        </div>

        <!-- Program & Preferences -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center space-x-2 mb-5">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                </div>
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider">Program &amp; Preferences</h3>
            </div>
            <dl class="space-y-3">
                <div class="flex items-center justify-between text-sm py-1.5 border-b border-gray-50">
                    <dt class="text-gray-500">Selected Program</dt>
                    <dd class="font-medium text-gray-900">{{ $registration->selected_program ?? '—' }}</dd>
                </div>
                <div class="flex items-center justify-between text-sm py-1.5 border-b border-gray-50">
                    <dt class="text-gray-500">Session Format</dt>
                    <dd class="font-medium text-gray-900">{{ $registration->preferred_session_format ?? '—' }}</dd>
                </div>
                <div class="flex items-center justify-between text-sm py-1.5 border-b border-gray-50">
                    <dt class="text-gray-500">Communication</dt>
                    <dd class="font-medium text-gray-900">{{ $registration->communication_preference ?? '—' }}</dd>
                </div>
                <div class="flex items-center justify-between text-sm py-1.5 border-b border-gray-50">
                    <dt class="text-gray-500">Willing to Participate</dt>
                    <dd>
                        @if($registration->willing_to_participate === 'Yes')
                            <span class="text-green-600 font-medium flex items-center"><svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Yes</span>
                        @elseif($registration->willing_to_participate === 'No')
                            <span class="text-red-600 font-medium flex items-center"><svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg> No</span>
                        @else
                            <span class="text-yellow-600 font-medium">{{ $registration->willing_to_participate ?? '—' }}</span>
                        @endif
                    </dd>
                </div>
                @if($registration->interested_sessions)
                <div class="text-sm py-1.5">
                    <dt class="text-gray-500 mb-2">Interested Sessions</dt>
                    <dd class="flex flex-wrap gap-1.5">
                        @foreach((array) $registration->interested_sessions as $session)
                            <span class="bg-blue-50 text-blue-700 text-xs px-3 py-1.5 rounded-full border border-blue-100">{{ $session }}</span>
                        @endforeach
                    </dd>
                </div>
                @endif
                @if($registration->personal_goals)
                <div class="text-sm pt-2">
                    <dt class="text-gray-500 mb-2 font-medium">Personal Goals</dt>
                    <dd class="text-gray-700 bg-gray-50 rounded-xl p-4 leading-relaxed text-sm">{{ $registration->personal_goals }}</dd>
                </div>
                @endif
            </dl>
        </div>
    </div>
</div>
@endsection