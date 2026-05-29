<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'MIBI — Make It or Break It', 'group' => 'general', 'type' => 'text'],
            ['key' => 'site_description', 'value' => 'Where Love Faces Reality — Emotional wellness, relationship coaching, and personal growth.', 'group' => 'general', 'type' => 'text'],
            ['key' => 'contact_email', 'value' => 'hello@mibi.africa', 'group' => 'general', 'type' => 'text'],
            ['key' => 'contact_phone', 'value' => '+254 700 000 000', 'group' => 'general', 'type' => 'text'],
            ['key' => 'whatsapp_number', 'value' => '254700000000', 'group' => 'general', 'type' => 'text'],
            ['key' => 'intro_video_url', 'value' => 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'group' => 'general', 'type' => 'text'],

            // Social Media
            ['key' => 'social_tiktok', 'value' => 'https://tiktok.com/@mibi', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/mibi', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/mibi', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_youtube', 'value' => 'https://youtube.com/@mibi', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_twitter', 'value' => 'https://x.com/mibi', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/mibi', 'group' => 'social', 'type' => 'text'],

            // Payment
            ['key' => 'mpesa_consumer_key', 'value' => '', 'group' => 'payment', 'type' => 'text'],
            ['key' => 'mpesa_consumer_secret', 'value' => '', 'group' => 'payment', 'type' => 'text'],
            ['key' => 'mpesa_passkey', 'value' => '', 'group' => 'payment', 'type' => 'text'],
            ['key' => 'mpesa_shortcode', 'value' => '174379', 'group' => 'payment', 'type' => 'text'],
            ['key' => 'stripe_key', 'value' => '', 'group' => 'payment', 'type' => 'text'],
            ['key' => 'stripe_secret', 'value' => '', 'group' => 'payment', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
