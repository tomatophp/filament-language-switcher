<?php

namespace TomatoPHP\FilamentLanguageSwitcher\Http\Controllers;

use Filament\Notifications\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use TomatoPHP\FilamentLanguageSwitcher\Models\UserLanguage;

class LanguageController
{
    public function index(Request $request): RedirectResponse
    {
        $request->validate([
            'lang' => 'required|string',
            'model' => 'required|string',
            'model_id' => 'required|integer',
        ]);

        $lang = UserLanguage::query()
            ->where('model_type', $request->get('model'))
            ->where('model_id', $request->get('model_id'))
            ->first();

        if ($lang) {
            $lang->lang = $request->get('lang');
            $lang->save();
        } else {
            UserLanguage::query()->create([
                'model_type' => $request->get('model'),
                'model_id' => $request->get('model_id'),
                'lang' => $request->get('lang'),
            ]);
        }

        Notification::make()
            ->title(trans('filament-language-switcher::translation.notification'))
            ->icon('heroicon-o-check-circle')
            ->iconColor('success')
            ->send();

        if (config('filament-language-switcher.redirect') === 'next') {
            return back();
        }

        return redirect()->to(config('filament-language-switcher.redirect'));
    }
}
