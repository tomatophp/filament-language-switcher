<?php

namespace TomatoPHP\FilamentLanguageSwitcher\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use TomatoPHP\FilamentLanguageSwitcher\Models\UserLanguage;

trait InteractsWithLanguages
{
    public function lang(): MorphOne
    {
        return $this->morphOne(UserLanguage::class, 'model');
    }

    public function getLangAttribute()
    {
        return $this->lang()->first()?->lang ?? config('app.locale', 'en');
    }
}
