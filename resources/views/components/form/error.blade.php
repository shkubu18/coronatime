@props(['name'])

@error($name)
<div class="flex items-center mt-2 ml-1">
    <x-form.warning-svg />
    <p class="text-warning-color">{{ __($message) }}</p>
</div>
@enderror
