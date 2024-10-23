<?php

namespace TomatoPHP\FilamentLanguageSwitcher\Models;

use Illuminate\Database\Eloquent\Model;

class UserLanguage extends Model
{
    protected $fillable = [
        'model_id',
        'model_type',
        'lang',
    ];

    public function model()
    {
        return $this->morphTo();
    }
}
