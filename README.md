![Screenshot](https://raw.githubusercontent.com/tomatophp/filament-language-switcher/master/arts/3x1io-tomato-language-switcher.jpg)

# Filament Language Switcher

[![Latest Stable Version](https://poser.pugx.org/tomatophp/filament-language-switcher/version.svg)](https://packagist.org/packages/tomatophp/filament-language-switcher)
[![License](https://poser.pugx.org/tomatophp/filament-language-switcher/license.svg)](https://packagist.org/packages/tomatophp/filament-language-switcher)
[![Downloads](https://poser.pugx.org/tomatophp/filament-language-switcher/d/total.svg)](https://packagist.org/packages/tomatophp/filament-language-switcher)

Switch between languages on your app using user base column on database

## Screenshots

![Switcher](https://raw.githubusercontent.com/tomatophp/filament-language-switcher/master/arts/switcher.png)
![Dropdown Ar](https://raw.githubusercontent.com/tomatophp/filament-language-switcher/master/arts/dropdown-ar.png)
![Dropdown En](https://raw.githubusercontent.com/tomatophp/filament-language-switcher/master/arts/dropdown-en.png)

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
use TomatoPHP\FilamentLanguageSwitcher\Traits\InteractsWithLanguages;
```

now you must see the switcher and you can change language as you like

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

## Other Filament Packages

Checkout our [Awesome TomatoPHP](https://github.com/tomatophp/awesome)