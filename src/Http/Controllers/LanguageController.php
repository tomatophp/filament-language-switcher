<?php

namespace TomatoPHP\FilamentLanguageSwitcher\Http\Controllers;

use Filament\Notifications\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use TomatoPHP\FilamentLanguageSwitcher\Models\UserLanguage;

class LanguageController
{
    public function index(Request $request): RedirectResponse
    {
        $request->validate([
            'lang' => 'required|string',
            'model' => 'required|string',
            'model_id' => 'required',
        ]);

        if (Schema::hasColumn(app($request->get('model'))->getTable(), 'lang')) {
            $model = app($request->get('model'))->find($request->get('model_id'));
            $model->lang = $request->get('lang');
            $model->save();
        } else {
            $lang = UserLanguage::query()
                ->where('model_type', app($request->get('model'))->getMorphClass())
                ->where('model_id', $request->get('model_id'))
                ->first();

            if ($lang) {
                $lang->lang = $request->get('lang');
                $lang->save();
            } else {
                UserLanguage::query()->create([
                    'model_type' => app($request->get('model'))->getMorphClass(),
                    'model_id' => $request->get('model_id'),
                    'lang' => $request->get('lang'),
                ]);
            }
        }

        Notification::make()
            ->title(trans('filament-language-switcher::translation.notification', locale: $request->get('lang')))
            ->icon('heroicon-o-check-circle')
            ->iconColor('success')
            ->send();

        if (config('filament-language-switcher.redirect') === 'next') {
            return back();
        }

        return redirect()->to(config('filament-language-switcher.redirect'));
    }
}
