@php
if(!function_exists('try_svg')) {
    function try_svg($name, $classes) {
        try {
            return svg($name, $classes);
        }
        catch(\Exception $e) {
            return '❓';
        }
    }
}
@endphp


<x-filament::dropdown >
    <x-slot name="trigger">
        <x-filament::avatar x-tooltip="{
            content: '{{ trans('filament-language-switcher::translation.change') }}',
            theme: $store.theme,
        }" id="filament-language-switcher" size="sm" src="https://cdn.jsdelivr.net/gh/hampusborgos/country-flags@main/svg/{{config('filament-language-switcher.locals')[app()->getLocale()]['flag']?:null}}.svg" />
    </x-slot>

    @foreach ($otherLanguages as $key=>$language)
        @php $isCurrent = app()->getLocale() === $key; @endphp
            <x-filament::dropdown.list.item
                :image="'https://cdn.jsdelivr.net/gh/hampusborgos/country-flags@main/svg/'.$language['flag'].'.svg'"
                tag="a"
                :href="route('languages.switcher', parameters: ['lang' => $key, 'model' => get_class(auth()->user()), 'model_id' => \Filament\Facades\Filament::auth()->user()->id])"
            >
                    <span @class(['font-semibold' => $isCurrent])>{{ trans('filament-language-switcher::translation.lang.'.$key) }}</span>

            </x-filament::dropdown.list.item>
    @endforeach
</x-filament::dropdown>