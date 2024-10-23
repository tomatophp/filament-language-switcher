<?php

namespace TomatoPHP\FilamentLanguageSwitcher;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\Contracts\View\View;
use TomatoPHP\FilamentLanguageSwitcher\Http\Middleware\LanguageMiddleware;

class FilamentLanguageSwitcherPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-language-switcher';
    }

    public function register(Panel $panel): void
    {
        $panel->renderHook(
            config('filament-language-switcher.language_switcher_render_hook'),
            fn (): View => $this->getLanguageSwitcherView()
        );

        $panel->authMiddleware([
            LanguageMiddleware::class,
        ], true);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): self
    {
        return new FilamentLanguageSwitcherPlugin;
    }

    /**
     * Returns a View object that renders the language switcher component.
     *
     * @return View The View object that renders the language switcher component.
     */
    private function getLanguageSwitcherView(): View
    {
        $locales = config('filament-language-switcher.locals');
        $currentLocale = app()->getLocale();
        $currentLanguage = collect($locales)->firstWhere('code', $currentLocale);
        $otherLanguages = $locales;
        $showFlags = config('filament-language-switcher.show_flags');

        return view('filament-language-switcher::language-switcher', compact(
            'otherLanguages',
            'currentLanguage',
            'showFlags',
        ));
    }
}
