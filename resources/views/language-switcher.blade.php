@php
    $flagUrl = fn (?string $flag): ?string => filled($flag) ? 'https://cdn.jsdelivr.net/gh/hampusborgos/country-flags@main/svg/' . $flag . '.svg' : null;
    $tooltip = \Illuminate\Support\Js::from(trans('filament-language-switcher::translation.change'));
@endphp

<x-filament::dropdown>
    <x-slot name="trigger">
        @if ($flagUrl($currentLanguage['flag'] ?? null))
            <x-filament::avatar
                x-tooltip="{ content: {{ $tooltip }}, theme: $store.theme }"
                id="filament-language-switcher"
                size="sm"
                :src="$flagUrl($currentLanguage['flag'] ?? null)"
            />
        @else
            <x-filament::icon-button
                x-tooltip="{ content: {{ $tooltip }}, theme: $store.theme }"
                id="filament-language-switcher"
                icon="heroicon-o-language"
                color="gray"
                :label="trans('filament-language-switcher::translation.change')"
            />
        @endif
    </x-slot>

    <x-filament::dropdown.list>
        @foreach ($otherLanguages as $key => $language)
            @php
                $isCurrent = app()->getLocale() === $key;
                $translationKey = 'filament-language-switcher::translation.lang.' . $key;
                $label = \Illuminate\Support\Facades\Lang::has($translationKey) ? trans($translationKey) : ($language['label'] ?? $key);
            @endphp

            <x-filament::dropdown.list.item
                :image="$showFlags ? $flagUrl($language['flag'] ?? null) : null"
                tag="a"
                :href="route('languages.switcher', ['lang' => $key])"
            >
                <span @class(['font-semibold' => $isCurrent])>{{ $label }}</span>
            </x-filament::dropdown.list.item>
        @endforeach
    </x-filament::dropdown.list>
</x-filament::dropdown>
