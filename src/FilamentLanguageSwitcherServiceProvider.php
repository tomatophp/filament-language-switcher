<?php

namespace TomatoPHP\FilamentLanguageSwitcher;

use Illuminate\Support\ServiceProvider;

class FilamentLanguageSwitcherServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->commands([
            Console\FilamentLanguageSwitcherInstall::class,
        ]);

        // Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/filament-language-switcher.php', 'filament-language-switcher');

        // Publish Config
        $this->publishes([
            __DIR__.'/../config/filament-language-switcher.php' => config_path('filament-language-switcher.php'),
        ], 'filament-language-switcher-config');

        // Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Publish Migrations
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'filament-language-switcher-migrations');

        // Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'filament-language-switcher');

        // Publish Views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/filament-language-switcher'),
        ], 'filament-language-switcher-views');

        // Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'filament-language-switcher');

        // Publish Lang
        $this->publishes([
            __DIR__.'/../resources/lang' => base_path('lang/vendor/filament-language-switcher'),
        ], 'filament-language-switcher-lang');

        // Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

    public function boot(): void
    {
        // you boot methods here
    }
}
