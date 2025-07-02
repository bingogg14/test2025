<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ComponentsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Blade::component('components.nav.navbar', 'navbar');
        Blade::component('components.nav.link', 'nav-link');
        Blade::component('components.page-header', 'page-header');
    }
}
