<?php

namespace App\Providers;

use App\Http\ViewComposers\SettingsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', SettingsComposer::class);
    }
}
