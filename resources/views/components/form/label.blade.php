@props(['name'])

<label for="{{ $name }}" class="font-semibold block mb-1">
    {{ ucwords($name) }}
</label>
