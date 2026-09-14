<?php

namespace TomatoPHP\FilamentLanguageSwitcher\Http\Controllers;

use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use TomatoPHP\FilamentLanguageSwitcher\Models\UserLanguage;

class LanguageController
{
    public function index(Request $request): RedirectResponse
    {
        // Only the signed in user can change their own language; the model and model_id
        // query parameters sent by older versions are ignored.
        $user = Filament::auth()->user() ?? $request->user();

        abort_unless($user instanceof Model, 403);

        $request->validate([
            'lang' => ['required', 'string', Rule::in(array_keys(config('filament-language-switcher.locals', [])))],
        ]);

        $lang = (string) $request->input('lang');

        if (Schema::hasColumn($user->getTable(), 'lang')) {
            $user->forceFill(['lang' => $lang])->save();
        } else {
            UserLanguage::query()->updateOrCreate(
                ['model_type' => $user->getMorphClass(), 'model_id' => $user->getKey()],
                ['lang' => $lang],
            );
        }

        Notification::make()
            ->title(trans('filament-language-switcher::translation.notification', locale: $lang))
            ->icon('heroicon-o-check-circle')
            ->iconColor('success')
            ->send();

        if (config('filament-language-switcher.redirect') === 'next') {
            return back();
        }

        return redirect()->to(config('filament-language-switcher.redirect'));
    }
}
