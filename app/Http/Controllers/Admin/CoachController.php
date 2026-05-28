<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = User::role('coach')
            ->withCount(['bookings as sessions_completed' => fn ($q) => $q->completed(),
                          'bookings as upcoming_sessions' => fn ($q) => $q->upcoming()])
            ->latest()
            ->paginate(20);

        return view('admin.coaches.index', compact('coaches'));
    }

    public function create()
    {
        return view('admin.coaches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8'],
            'bio' => ['nullable', 'string', 'max:2000'],
        ]);

        $coach = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'bio' => $request->bio,
            'is_active' => true,
        ]);
        $coach->assignRole('coach');

        return redirect()->route('admin.coaches.index')->with('success', 'Coach added.');
    }

    public function show(User $coach)
    {
        if (!$coach->hasRole('coach')) {
            abort(404);
        }

        $coach->load([
            'bookings' => fn ($q) => $q->with('user', 'service')->latest()->take(10),
            'coachingSessions',
        ]);

        $stats = [
            'total_sessions' => Booking::where('coach_id', $coach->id)->count(),
            'completed_sessions' => Booking::where('coach_id', $coach->id)->completed()->count(),
            'upcoming_sessions' => Booking::where('coach_id', $coach->id)->upcoming()->count(),
            'total_clients' => Booking::where('coach_id', $coach->id)->distinct('user_id')->count('user_id'),
            'rating' => 4.8, // placeholder
        ];

        return view('admin.coaches.show', compact('coach', 'stats'));
    }

    public function edit(User $coach)
    {
        if (!$coach->hasRole('coach')) abort(404);
        return view('admin.coaches.edit', compact('coach'));
    }

    public function update(Request $request, User $coach)
    {
        $coach->update($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $coach->id],
            'phone' => ['nullable', 'string', 'max:20'],
            'bio' => ['nullable', 'string', 'max:2000'],
            'is_active' => ['boolean'],
        ]));

        return redirect()->route('admin.coaches.index')->with('success', 'Coach updated.');
    }
}
