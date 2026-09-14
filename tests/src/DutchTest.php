<?php

use Filament\Pages\Dashboard;
use TomatoPHP\FilamentLanguageSwitcher\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('ships Dutch as a configured locale (#21)', function () {
    expect(config('filament-language-switcher.locals'))->toHaveKey('nl');
});

it('names Dutch in every language file (#21)', function (string $file) {
    $translations = require $file;

    expect($translations['lang'])->toHaveKey('nl');
})->with(fn () => glob(__DIR__.'/../../resources/lang/*/translation.php'));

it('names Dutch in Dutch (#21)', function () {
    expect(trans('filament-language-switcher::translation.lang.nl', [], 'nl'))->toBe('Nederlands');
});

it('shows Dutch in the switcher instead of the raw translation key (#21)', function () {
    actingAs(User::factory()->create());

    get(Dashboard::getUrl())
        ->assertOk()
        ->assertSee('Dutch')
        ->assertDontSee('translation.lang.nl');
});

it('falls back to the configured label for a locale without a translated name', function () {
    config()->set('filament-language-switcher.locals.sw', ['label' => 'Kiswahili', 'flag' => 'tz']);

    actingAs(User::factory()->create());

    get(Dashboard::getUrl())
        ->assertOk()
        ->assertSee('Kiswahili')
        ->assertDontSee('translation.lang.sw');
});

it('renders when the current locale is not configured', function () {
    $user = User::factory()->create();
    actingAs($user);

    app()->setLocale('sw');
    config()->set('app.locale', 'sw');

    get(Dashboard::getUrl())->assertOk()->assertSee('id="filament-language-switcher"', false);
});
