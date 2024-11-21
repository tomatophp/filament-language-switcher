<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (config('filament-language-switcher.allow_user_lang_table')) {
            Schema::create('user_languages', function (Blueprint $table) {
                $table->id();
                $table->string('model_id');
                $table->string('model_type');
                $table->string('lang')->default('en')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_languages');
    }
};
