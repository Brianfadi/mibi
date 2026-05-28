<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\RegistrationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(
        private RegistrationService $registrationService
    ) {}

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $redirectTo = match (true) {
                auth()->user()->hasRole('admin') => route('admin.dashboard'),
                default => route('home'),
            };

            return redirect()->intended($redirectTo);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegisterUserRequest $request)
    {
        $user = $this->registrationService->registerUser($request->validated());

        Auth::login($user);

        $redirectTo = auth()->user()->hasRole('admin')
            ? route('admin.dashboard')
            : route('home');

        return redirect()->intended($redirectTo)
            ->with('success', 'Welcome to MIBI! Your journey to healing starts now.');
    }

    public function showProfile()
    {
        $user = auth()->user()->load(['bookings.service', 'liveSessions']);

        return view('auth.profile', compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = $this->registrationService->completeProfile(
            auth()->user(),
            $request->validated()
        );

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->update(['avatar' => $path]);
        }

        return back()->with('success', 'Profile updated successfully.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
