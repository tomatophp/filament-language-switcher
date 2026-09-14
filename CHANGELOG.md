# V5.0.0

- upgrade to Filament v5 and Livewire 4 (Laravel 12 and 13, PHP 8.2+)
- security: the switch route only changes the language of the signed in user; guests get a 403, languages that are not configured are rejected and the `model` / `model_id` query parameters are ignored (the class named in the request was instantiated before)
- add Dutch (`nl`) to the default locales and name it in every language file (#21)
- a locale without a translated name shows its label from the config instead of the raw translation key
- fix the switcher when the current locale is not configured, respect `show_flags`
- users without a saved language get `app.locale` instead of `en`
- `filament-language-switcher:install` runs the migrations in-process
- add tests for the switcher, the route security and Dutch

# V1.0.0

First release of the package
