<?php

namespace TomatoPHP\FilamentLanguageSwitcher\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;

trait InteractsWithLanguages
{
    public function lang(): MorphOne
    {
        return $this->morphOne('TomatoPHP\FilamentLanguageSwitcher\Models\UserLanguage', 'model');
    }

    public function getLangAttribute()
    {
        return $this->lang()->first()?->lang ?? 'en';
    }
}
