<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SettingsService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct(
        private SettingsService $settingsService
    ) {}

    public function index()
    {
        return view('admin.settings.index', [
            'settingsService' => $this->settingsService,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => ['nullable', 'string', 'max:255'],
            'site_description' => ['nullable', 'string', 'max:500'],
            'contact_email' => ['nullable', 'email'],
            'contact_phone' => ['nullable', 'string', 'max:20'],
            'whatsapp_number' => ['nullable', 'string', 'max:20'],
            'social_tiktok' => ['nullable', 'url'],
            'social_instagram' => ['nullable', 'url'],
            'social_facebook' => ['nullable', 'url'],
            'social_youtube' => ['nullable', 'url'],
            'social_twitter' => ['nullable', 'url'],
            'social_linkedin' => ['nullable', 'url'],
            'mpesa_consumer_key' => ['nullable', 'string'],
            'mpesa_consumer_secret' => ['nullable', 'string'],
            'mpesa_passkey' => ['nullable', 'string'],
            'mpesa_shortcode' => ['nullable', 'string'],
            'stripe_key' => ['nullable', 'string'],
            'stripe_secret' => ['nullable', 'string'],
        ]);

        foreach ($request->except('_token') as $key => $value) {
            if ($value !== null) {
                $group = match (true) {
                    str_starts_with($key, 'social_') => 'social',
                    str_starts_with($key, 'mpesa_') || str_starts_with($key, 'stripe_') => 'payment',
                    default => 'general',
                };
                $this->settingsService->set($key, $value, $group);
            }
        }

        return back()->with('success', 'Settings updated successfully.');
    }
}
