<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationApproved;
use App\Models\Registration;
use App\Models\User;
use App\Models\AdminNotification;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
        $coaches = User::role('coach')->active()->get();
        return view('admin.registrations.show', compact('registration', 'coaches'));
    }

    public function approve(Registration $registration)
    {
        $registration->approve(request('coach_id'));

        // Generate credentials and update user password
        $password = Str::password(10);
        $registration->user->update([
            'password' => Hash::make($password),
        ]);

        // Send credentials email
        try {
            Mail::to($registration->email)->send(new RegistrationApproved($registration, $password));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send approval email: ' . $e->getMessage());
        }

        AdminNotification::notify(
            'registration',
            'Registration Approved',
            "{$registration->user->name}'s registration approved. Credentials sent.",
            ['registration_id' => $registration->id]
        );

        ActivityLog::log($registration, 'approved', "Registration approved for {$registration->user->name}");

        return back()->with('success', 'Registration approved. Credentials sent to applicant.');
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
