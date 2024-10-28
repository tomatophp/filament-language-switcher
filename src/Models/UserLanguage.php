<?php

namespace TomatoPHP\FilamentLanguageSwitcher\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class UserLanguage extends Model
{
    protected $fillable = [
        'model_id',
        'model_type',
        'lang',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return MorphTo
     */
    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
