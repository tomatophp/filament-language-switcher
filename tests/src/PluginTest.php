<?php

use Filament\Facades\Filament;
use TomatoPHP\FilamentLanguageSwitcher\FilamentLanguageSwitcherPlugin;

it('registers plugin', function () {
    $panel = Filament::getCurrentPanel();

    $panel->plugins([
        FilamentLanguageSwitcherPlugin::make(),
    ]);

    expect($panel->getPlugin('filament-language-switcher'))
        ->not()
        ->toThrow(Exception::class);
});
