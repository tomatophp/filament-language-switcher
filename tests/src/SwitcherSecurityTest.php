<?php

use Illuminate\Support\Facades\Auth;
use TomatoPHP\FilamentLanguageSwitcher\Models\UserLanguage;
use TomatoPHP\FilamentLanguageSwitcher\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('changes the language of the signed in user only, whatever model_id is sent', function () {
    $user = User::factory()->create();
    $other = User::factory()->create();

    actingAs($user);

    get(route('languages.switcher', [
        'lang' => 'ar',
        'model' => User::class,
        'model_id' => $other->id,
    ]))->assertRedirect();

    expect(UserLanguage::query()->where('model_id', $other->id)->exists())->toBeFalse()
        ->and($user->fresh()->lang)->toBe('ar');
});

it('does not let guests change a language', function () {
    $user = User::factory()->create();

    Auth::logout();

    get(route('languages.switcher', [
        'lang' => 'ar',
        'model' => User::class,
        'model_id' => $user->id,
    ]))->assertForbidden();

    expect(UserLanguage::query()->count())->toBe(0);
});

it('rejects a language that is not configured', function () {
    actingAs(User::factory()->create());

    get(route('languages.switcher', ['lang' => 'xx']))
        ->assertSessionHasErrors('lang');

    expect(UserLanguage::query()->count())->toBe(0);
});

it('updates the stored language instead of adding a row', function () {
    $user = User::factory()->create();
    actingAs($user);

    get(route('languages.switcher', ['lang' => 'ar']));
    get(route('languages.switcher', ['lang' => 'fr']));

    expect(UserLanguage::query()->count())->toBe(1)
        ->and($user->fresh()->lang)->toBe('fr');
});
