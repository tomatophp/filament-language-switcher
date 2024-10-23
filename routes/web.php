<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/languages/switcher', [\TomatoPHP\FilamentLanguageSwitcher\Http\Controllers\LanguageController::class, 'index'])
    ->middleware(config('filament-language-switcher.language_switcher_middlewares'))
    ->name('languages.switcher');
