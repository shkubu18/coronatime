@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <input
        class="w-full border-2 border-gray-200 rounded-md p-2.5 px-4"
        type="text"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name) }}"
        {{ $attributes }}
    >
</x-form.field>
