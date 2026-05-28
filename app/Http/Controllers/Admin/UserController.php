<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\RegistrationService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private RegistrationService $registrationService
    ) {}

    public function index()
    {
        $users = User::with('roles')
            ->latest()
            ->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $user->load(['bookings.service', 'payments', 'testimonials']);

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'phone' => ['nullable', 'string', 'max:20'],
            'is_active' => ['boolean'],
        ]));

        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    public function deactivate(User $user)
    {
        $this->registrationService->deactivateUser($user);

        return back()->with('success', 'User deactivated.');
    }

    public function activate(User $user)
    {
        $this->registrationService->reactivateUser($user);

        return back()->with('success', 'User activated.');
    }
}
