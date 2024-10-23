<?php

use Illuminate\Support\Facades\Artisan;

it('check install command', function () {
    Artisan::call('filament-language-switcher:install');

    $schema = \Illuminate\Support\Facades\Schema::hasTable('user_languages');

    expect($schema)->toBeTrue();
});
