<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Collection;

class SettingsService
{
    private ?Collection $cache = null;

    public function get(string $key, $default = null): ?string
    {
        $this->loadCache();

        return $this->cache->get($key, $default);
    }

    public function set(string $key, $value, string $group = 'general', string $type = 'text'): void
    {
        Setting::setValue($key, $value, $group, $type);
        $this->cache = null;
    }

    public function getGroup(string $group): array
    {
        $this->loadCache();

        return $this->cache
            ->filter(fn ($val, $key) => Setting::where('key', $key)->value('group') === $group)
            ->toArray();
    }

    public function getAll(): array
    {
        $this->loadCache();
        return $this->cache->toArray();
    }

    public function getSocialLinks(): array
    {
        return [
            'tiktok' => $this->get('social_tiktok'),
            'instagram' => $this->get('social_instagram'),
            'facebook' => $this->get('social_facebook'),
            'youtube' => $this->get('social_youtube'),
            'twitter' => $this->get('social_twitter'),
            'linkedin' => $this->get('social_linkedin'),
        ];
    }

    public function getWhatsappNumber(): ?string
    {
        return $this->get('whatsapp_number');
    }

    public function getContactEmail(): ?string
    {
        return $this->get('contact_email');
    }

    public function getContactPhone(): ?string
    {
        return $this->get('contact_phone');
    }

    private function loadCache(): void
    {
        if ($this->cache === null) {
            $this->cache = Setting::pluck('value', 'key');
        }
    }
}
