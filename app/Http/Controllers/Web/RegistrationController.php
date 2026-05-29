<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationConfirmation;
use App\Models\AdminNotification;
use App\Models\Registration;
use App\Models\Service;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function showForm()
    {
        $services = Service::active()->orderBy('sort_order')->get();
        $programs = Program::active()->orderBy('sort_order')->get();
        return view('pages.register', compact('services', 'programs'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:1', 'max:150'],
            'gender' => ['required', 'string', 'in:male,female'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'nationality' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'occupation' => ['nullable', 'string', 'max:255'],
            'relationship_status' => ['required', 'string'],
            'relationship_length' => ['nullable', 'string'],
            'challenge_type' => ['required', 'string'],
            'challenge_explanation' => ['nullable', 'string', 'max:5000'],
            'emotional_effects' => ['nullable', 'array'],
            'emotional_effects.*' => ['string'],
            'has_spoken_to_someone' => ['nullable', 'boolean'],
            'support_hoping_for' => ['nullable', 'string', 'max:5000'],
            'interested_sessions' => ['nullable', 'array'],
            'interested_sessions.*' => ['string'],
            'selected_program' => ['nullable', 'string'],
            'preferred_session_format' => ['nullable', 'string'],
            'preferred_communication' => ['nullable', 'string'],
            'willing_to_participate' => ['nullable', 'string', 'in:Yes,No,Maybe'],
            'personal_goals' => ['nullable', 'string', 'max:5000'],
            'terms_accepted' => ['required', 'accepted'],
        ]);

        // Auto-create a user account for the applicant
        $password = Str::password(12);
        $user = User::firstOrCreate(
            ['email' => $validated['email']],
            [
                'name' => $validated['full_name'],
                'password' => Hash::make($password),
                'phone' => $validated['phone'],
            ]
        );

        $registration = Registration::create([
            'user_id' => $user->id,
            'full_name' => $validated['full_name'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'country' => $validated['country'],
            'city' => $validated['city'],
            'nationality' => $validated['nationality'] ?? null,
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'occupation' => $validated['occupation'] ?? null,
            'relationship_status' => $validated['relationship_status'],
            'relationship_length' => $validated['relationship_length'] ?? null,
            'challenge_type' => $validated['challenge_type'],
            'challenge_explanation' => $validated['challenge_explanation'] ?? null,
            'emotional_effects' => $validated['emotional_effects'] ?? null,
            'has_spoken_to_someone' => $request->boolean('has_spoken_to_someone'),
            'support_hoping_for' => $validated['support_hoping_for'] ?? null,
            'interested_sessions' => $validated['interested_sessions'] ?? [],
            'selected_program' => $validated['selected_program'] ?? null,
            'preferred_session_format' => $validated['preferred_session_format'] ?? null,
            'communication_preference' => $validated['preferred_communication'] ?? null,
            'willing_to_participate' => $validated['willing_to_participate'] ?? null,
            'personal_goals' => $validated['personal_goals'] ?? null,
            'terms_accepted' => true,
            'status' => 'pending',
        ]);

        // Send confirmation email to applicant
        try {
            Mail::to($registration->email)->send(new RegistrationConfirmation($registration));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send registration confirmation: ' . $e->getMessage());
        }

        // Notify admin
        AdminNotification::notify(
            'registration',
            'New Registration',
            "{$registration->full_name} has submitted a registration.",
            ['registration_id' => $registration->id]
        );

        return redirect()->route('register.thanks')->with('success', 'Your registration has been submitted successfully. We will contact you shortly.');
    }

    public function thanks()
    {
        return view('pages.register-thanks');
    }
}
