![Screenshot](https://raw.githubusercontent.com/tomatophp/filament-language-switcher/master/arts/fadymondy-tomato-language-switcher.jpg)

# Filament Language Switcher

[![Dependabot Updates](https://github.com/tomatophp/filament-language-switcher/actions/workflows/dependabot/dependabot-updates/badge.svg)](https://github.com/tomatophp/filament-language-switcher/actions/workflows/dependabot/dependabot-updates)
[![PHP Code Styling](https://github.com/tomatophp/filament-language-switcher/actions/workflows/fix-php-code-styling.yml/badge.svg)](https://github.com/tomatophp/filament-language-switcher/actions/workflows/fix-php-code-styling.yml)
[![Tests](https://github.com/tomatophp/filament-language-switcher/actions/workflows/tests.yml/badge.svg?branch=master)](https://github.com/tomatophp/filament-language-switcher/actions/workflows/tests.yml)
[![Latest Stable Version](https://poser.pugx.org/tomatophp/filament-language-switcher/version.svg)](https://packagist.org/packages/tomatophp/filament-language-switcher)
[![License](https://poser.pugx.org/tomatophp/filament-language-switcher/license.svg)](https://packagist.org/packages/tomatophp/filament-language-switcher)
[![Downloads](https://poser.pugx.org/tomatophp/filament-language-switcher/d/total.svg)](https://packagist.org/packages/tomatophp/filament-language-switcher)

Switch between languages on your app using user base column on database

## Version Compatibility

| Plugin | Filament | Laravel | PHP |
|--------|----------|---------|-----|
| 1.x | 3.x | 10.x / 11.x | 8.1+ |
| 4.x ([`4.x` branch](https://github.com/tomatophp/filament-language-switcher/tree/4.x)) | 4.x | 11.x / 12.x | 8.2+ |
| 5.x | 5.x | 12.x / 13.x | 8.2+ |

## Screenshots

![Switcher Light](https://raw.githubusercontent.com/tomatophp/filament-language-switcher/master/arts/switcher-light.png)
![RTL](https://raw.githubusercontent.com/tomatophp/filament-language-switcher/master/arts/rtl.png)
![Dropdown Light](https://raw.githubusercontent.com/tomatophp/filament-language-switcher/master/arts/dropdown-light.png)
![Dropdown Dark](https://raw.githubusercontent.com/tomatophp/filament-language-switcher/master/arts/dropdown-dark.png)

## Installation

```bash
composer require tomatophp/filament-language-switcher
```
after install your package please run this command

```bash
php artisan filament-language-switcher:install
```

finally register the plugin on `/app/Providers/Filament/AdminPanelProvider.php`

```php
->plugin(\TomatoPHP\FilamentLanguageSwitcher\FilamentLanguageSwitcherPlugin::make())
```

now on your `User.php` model or any user model add this trait

```php
use \TomatoPHP\FilamentLanguageSwitcher\Traits\InteractsWithLanguages;
```

now you must see the switcher and you can change language as you like

If your user table has a `lang` column it is used, otherwise the language is stored in the `user_languages` table.
Users who never picked a language get `app.locale`.

## Languages

The languages shown in the switcher come from the `locals` key of the config file. Each language needs a `label` and a `flag`
(a country code from [country-flags](https://github.com/hampusborgos/country-flags)):

```php
'locals' => [
    'en' => ['label' => 'English', 'flag' => 'gb'],
    'nl' => ['label' => 'Dutch', 'flag' => 'nl'],
],
```

The package names every default language in 18 languages; a language without a translated name shows its `label`.
Set `show_flags` to `false` to hide the flags in the list.

## Security

The switch route (`/languages/switcher?lang=xx`) only changes the language of the signed in user. Guests get a 403 and languages that are not
in `locals` are rejected. The `model` and `model_id` parameters sent by older versions are ignored.

## Publish Assets

you can publish config file by use this command

```bash
php artisan vendor:publish --tag="filament-language-switcher-config"
```

you can publish views file by use this command

```bash
php artisan vendor:publish --tag="filament-language-switcher-views"
```

you can publish languages file by use this command

```bash
php artisan vendor:publish --tag="filament-language-switcher-lang"
```

you can publish migrations file by use this command

```bash
php artisan vendor:publish --tag="filament-language-switcher-migrations"
```

## Testing

if you like to run `PEST` testing just use this command

```bash
composer test
```

## Code Style

if you like to fix the code style just use this command

```bash
composer format
```

## PHPStan

if you like to check the code by `PHPStan` just use this command

```bash
composer analyse
```

## Other Filament Packages

Checkout our [Awesome TomatoPHP](https://github.com/tomatophp/awesome)
