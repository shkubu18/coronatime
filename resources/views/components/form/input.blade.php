@props(['name', 'hint'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <input
        class="w-full border-2 border-gray-200 rounded-md p-2.5 px-4"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name) }}"
        {{ $attributes }}
    >

    @if (isset($hint) && $hint === 'sing_up')
        <span class="text-sm text-gray-400 block">Username should be unique, min 3 symbols</span>
    @endif
</x-form.field>
