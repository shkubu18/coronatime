@props(['name', 'hint', 'label'])

<x-form.field>
    <x-form.label inputName="{{ $name }}" labelName="{{ $label }}" />
    <div class="relative">
        <input
            @if($errors->has('auth_fail') || $errors->has('email_verify'))
                class="w-full border-2 rounded-md p-2.5 pl-5 pr-8 border-warning-color"
            @else
                class="w-full border-2 rounded-md p-2.5 pl-5 pr-8 {{ $errors->has($name) ? 'border-warning-color' : (old($name) && !$errors->has($name) ? 'border-input-green' : 'border-light-gray') }}"
            @endif
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ old($name) }}"
            {{ $attributes }}
        >
        <x-form.validation-passed-svg name="{{ $name }}" />
    </div>

    @if (isset($hint) && $hint === 'sing_up' && !$errors->has('username'))
        <span class="text-sm text-gray block mt-1 ml-1">{{ __('register.username_hint') }}</span>
    @endif
    <x-form.error name="{{ $name }}" />
</x-form.field>
