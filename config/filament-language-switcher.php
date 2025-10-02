<?php

use Filament\View\PanelsRenderHook;

return [
    /*
     |--------------------------------------------------------------------------
     | Locals
     |--------------------------------------------------------------------------
     |
     | add the locals that will be show on the languages selector
     |
     */
    'locals' => [
        'en' => [
            'label' => 'English',
            'flag' => 'gb',
        ],
        'ar' => [
            'label' => 'Arabic',
            'flag' => 'sa',
        ],
        'fr' => [
            'label' => 'French',
            'flag' => 'fr',
        ],
        'it' => [
            'label' => 'Italian',
            'flag' => 'it',
        ],
        'es' => [
            'label' => 'Spanish',
            'flag' => 'es',
        ],
        'de' => [
            'label' => 'German',
            'flag' => 'de',
        ],
        'pt_BR' => [
            'label' => 'Português (Brasil)',
            'flag' => 'br',
        ],
        'pt_PT' => [
            'label' => 'Portuguese (Portugal)',
            'flag' => 'pt',
        ],
        'zh' => [
            'label' => 'Chinese',
            'flag' => 'cn',
        ],
        'km' => [
            'label' => 'Khmer',
            'flag' => 'kh',
        ],
        'ko' => [
            'label' => 'Korean',
            'flag' => 'kr',
        ],
        'ja' => [
            'label' => 'Japanese',
            'flag' => 'jp',
        ],
        'hi' => [
            'label' => 'Hindi',
            'flag' => 'in',
        ],
        'ru' => [
            'label' => 'Russian',
            'flag' => 'ru',
        ],
        'tr' => [
            'label' => 'Turkish',
            'flag' => 'tr',
        ],
        'my' => [
            'label' => 'Burmese',
            'flag' => 'mm',
        ],
        'id' => [
            'label' => 'Indonesian',
            'flag' => 'id',
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Show Flags
     |--------------------------------------------------------------------------
     |
     | Show flags on the language selector
     |
     */
    'show_flags' => true,

    /*
    |--------------------------------------------------------------------------
    |
    | Determines the render hook for the language switcher.
    | Available render hooks: https://filamentphp.com/docs/3.x/support/render-hooks#available-render-hooks
    |
    */

    'language_switcher_render_hook' => PanelsRenderHook::USER_MENU_BEFORE,

    /*
     |--------------------------------------------------------------------------
     |
     | Language Switch Middlewares
     |
     */
    'language_switcher_middlewares' => [
        'web',
    ],

    /*
    |--------------------------------------------------------------------------
    | Redirect
    |--------------------------------------------------------------------------
    |
    | set the redirect path when change the language between selected path or next request
    |
    */
    'redirect' => 'next',

    /*
    |--------------------------------------------------------------------------
    | User Language Table
    |--------------------------------------------------------------------------
    |
    | set the user language table to store the user language, if your model don't have lang field
    |
    */
    'allow_user_lang_table' => true,
];
