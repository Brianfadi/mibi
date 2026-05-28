@extends('layouts.app')

@section('title', 'My Profile — MIBI')

@section('content')
<section class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">My Profile</h1>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Profile Info -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
                    <h2 class="text-lg font-semibold mb-4">Personal Information</h2>
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                            <textarea name="bio" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500">{{ old('bio', $user->bio) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Timezone</label>
                            <select name="timezone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500">
                                @foreach(timezone_identifiers_list() as $tz)
                                    <option value="{{ $tz }}" {{ ($user->timezone ?? 'Africa/Nairobi') === $tz ? 'selected' : '' }}>{{ $tz }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition">Update Profile</button>
                    </form>
                </div>

                <!-- My Bookings -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-lg font-semibold mb-4">My Bookings</h2>
                    @forelse($user->bookings as $booking)
                    <div class="flex justify-between items-center py-3 border-b border-gray-50 last:border-0">
                        <div>
                            <p class="font-medium">{{ $booking->service?->title ?? 'General Session' }}</p>
                            <p class="text-sm text-gray-500">{{ $booking->scheduled_at->format('M j, Y g:i A') }}</p>
                        </div>
                        <span class="text-xs px-2 py-1 rounded-full bg-{{ $booking->status === 'confirmed' ? 'green' : ($booking->status === 'pending' ? 'yellow' : 'gray') }}-100 text-{{ $booking->status === 'confirmed' ? 'green' : ($booking->status === 'pending' ? 'yellow' : 'gray') }}-800">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>
                    @empty
                    <p class="text-gray-500 text-sm">No bookings yet.</p>
                    @endforelse
                    <a href="{{ route('bookings.create') }}" class="mt-4 inline-block text-sm text-red-600 hover:text-red-700">Book a Session →</a>
                </div>
            </div>

            <!-- Avatar -->
            <div>
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 text-center">
                    <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="" class="w-full h-full rounded-full object-cover">
                        @else
                            <span class="text-3xl font-bold text-red-600">{{ substr($user->name, 0, 1) }}</span>
                        @endif
                    </div>
                    <h3 class="font-semibold">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
