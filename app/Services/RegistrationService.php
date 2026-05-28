<?php

namespace App\Services;

use App\Models\User;
use App\Models\LiveSession;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegistrationService
{
    public function registerUser(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
                'password' => Hash::make($data['password']),
                'gender' => $data['gender'] ?? null,
                'date_of_birth' => $data['date_of_birth'] ?? null,
                'timezone' => $data['timezone'] ?? config('app.timezone'),
            ]);

            $user->assignRole('client');

            return $user;
        });
    }

    public function registerForLiveSession(User $user, LiveSession $session): void
    {
        if ($session->participants()->where('user_id', $user->id)->exists()) {
            throw new \RuntimeException('You are already registered for this session.');
        }

        if (!$session->hasAvailableSpots()) {
            throw new \RuntimeException('This session is fully booked.');
        }

        $session->participants()->attach($user->id, [
            'registered_at' => now(),
        ]);
    }

    public function completeProfile(User $user, array $data): User
    {
        $user->update([
            'bio' => $data['bio'] ?? $user->bio,
            'phone' => $data['phone'] ?? $user->phone,
            'avatar' => $data['avatar'] ?? $user->avatar,
            'timezone' => $data['timezone'] ?? $user->timezone,
            'emergency_contact' => $data['emergency_contact'] ?? $user->emergency_contact,
        ]);

        return $user;
    }

    public function deactivateUser(User $user): void
    {
        $user->update(['is_active' => false]);
    }

    public function reactivateUser(User $user): void
    {
        $user->update(['is_active' => true]);
    }
}
