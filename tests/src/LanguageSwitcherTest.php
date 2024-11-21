<?php

use Filament\Notifications\Notification;
use Illuminate\Support\Str;
use TomatoPHP\FilamentLanguageSwitcher\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    actingAs(User::factory()->create());
});

it('has a language switcher', function () {
    // Render the view
    // Perform a GET request to fetch the HTML content of the page
    $response = get(\Filament\Pages\Dashboard::getUrl()); // replace with your route

    // Ensure the response status is OK (200)
    $response->assertStatus(200);

    // Get the HTML content of the response
    $html = $response->getContent();

    // Use Laravel's native Crawler (based on Symfony's DomCrawler)
    $crawler = Str::of($html);

    // Check if the element with the specific ID exists
    $elementExists = $crawler->contains('id="filament-language-switcher"'); // replace 'your-id-here' with the actual id you're checking

    // Assert that the element exists
    expect($elementExists)->toBeTrue();
});

it('can switch language to en', function () {
    $response = get(route('languages.switcher', [
        'model' => get_class(auth()->user()),
        'model_id' => auth()->user()->id,
        'lang' => 'en',
    ]));

    // Ensure the response status is OK (200)
    $response->assertStatus(302);

    $currentLang = auth()->user()->lang == 'en';

    expect($currentLang)->toBeTrue();
});

it('can switch language to ar', function () {
    $response = get(route('languages.switcher', [
        'model' => get_class(auth('web')->user()),
        'model_id' => auth()->user()->id,
        'lang' => 'ar',
    ]));

    // Ensure the response status is OK (200)
    $response->assertStatus(302);

    $currentLang = auth('web')->user()->lang == 'ar';

    expect($currentLang)->toBeTrue();
});

it('sends a notification in the newly selected language', function (string $locale) {
    $response = get(route('languages.switcher', [
        'model' => get_class(auth('web')->user()),
        'model_id' => auth()->user()->id,
        'lang' => $locale,
    ]));

    // Ensure the response status is OK (200)
    $response->assertStatus(302);

    Notification::assertNotified(
        Notification::make()
            ->title(trans('filament-language-switcher::translation.notification', locale: $locale))
            ->icon('heroicon-o-check-circle')
            ->iconColor('success')
    );
})->with(['locale' => ['en', 'nl', 'ar', 'de']]);
