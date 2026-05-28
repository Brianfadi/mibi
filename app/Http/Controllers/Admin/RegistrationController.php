<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\User;
use App\Models\AdminNotification;
use App\Models\ActivityLog;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with(['user', 'assignedCoach'])
            ->latest()
            ->paginate(20);

        $coaches = User::role('coach')->active()->get();

        return view('admin.registrations.index', compact('registrations', 'coaches'));
    }

    public function show(Registration $registration)
    {
        $registration->load(['user', 'assignedCoach']);
        return view('admin.registrations.show', compact('registration'));
    }

    public function approve(Registration $registration)
    {
        $registration->approve(request('coach_id'));

        AdminNotification::notify(
            'registration',
            'Registration Approved',
            "{$registration->user->name}'s registration approved.",
            ['registration_id' => $registration->id]
        );

        ActivityLog::log($registration, 'approved', "Registration approved for {$registration->user->name}");

        return back()->with('success', 'Registration approved.');
    }

    public function reject(Registration $registration)
    {
        $registration->reject();
        ActivityLog::log($registration, 'rejected', "Registration rejected for {$registration->user->name}");

        return back()->with('success', 'Registration rejected.');
    }

    public function pending()
    {
        $registrations = Registration::with(['user'])
            ->pending()
            ->latest()
            ->paginate(20);

        $coaches = User::role('coach')->active()->get();

        return view('admin.registrations.index', compact('registrations', 'coaches'));
    }
}
