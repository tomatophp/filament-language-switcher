<?php

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
            'flag' => 'us',
        ],
        'ar' => [
            'label' => 'Arabic',
            'flag' => 'eg',
        ],
        'pt_BR' => [
            'label' => 'Português (Brasil)',
            'flag' => 'br',
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

    'language_switcher_render_hook' => 'panels::user-menu.before',

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
