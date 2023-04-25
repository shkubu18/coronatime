@props(['name', 'hint'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <div class="relative">
        <input
            class="w-full border-2 rounded-md p-2.5 pl-5 pr-8 {{ $errors->has($name) ? 'border-red-700' : (old($name) && !$errors->has($name) ? 'border-green-600' : 'border-gray-200') }}"
            @if(isset($hint))
                name="{{ $hint === 'login' ? 'login' : $name }}"
            @else
                name="{{ $name }}"
            @endif
            id="{{ $name }}"
            value="{{ old($name) }}"
            {{ $attributes }}
        >
        <img
            class="h-4 absolute top-4 right-3 {{ old($name) && !$errors->has($name) ? 'block' : 'hidden' }}"
            src="{{ asset('./assets/icons/input-checkmark.png') }}"
            alt="checkmark icon"
        >
    </div>

    @if (isset($hint) && $hint === 'sing_up' && !$errors->has('username'))
        <span class="text-sm text-gray-400 block">Username should be unique, min 3 symbols</span>
    @endif
    <x-form.error name="{{ $name }}" />
</x-form.field>
