<?php

namespace App\Http\ViewComposers;

use App\Services\SettingsService;
use Illuminate\View\View;

class SettingsComposer
{
    public function __construct(
        private SettingsService $settingsService
    ) {}

    public function compose(View $view): void
    {
        $view->with([
            'siteName' => $this->settingsService->get('site_name', 'MIBI'),
            'whatsappNumber' => $this->settingsService->getWhatsappNumber(),
            'contactEmail' => $this->settingsService->getContactEmail(),
            'contactPhone' => $this->settingsService->getContactPhone(),
            'socialLinks' => $this->settingsService->getSocialLinks(),
        ]);
    }
}
