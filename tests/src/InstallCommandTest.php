<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

it('check install command', function () {
    Artisan::call('filament-language-switcher:install');

    $schema = Schema::hasTable('user_languages');

    expect($schema)->toBeTrue();
});
