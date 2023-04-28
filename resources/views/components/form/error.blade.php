@props(['name'])

@error($name)
<div class="flex items-center mt-2 ml-1">
    <img class="h-4 mr-3" src="{{ asset('./assets/icons/input-warning.png') }}" alt="warning icon">
    <p class="text-red">{{ __($message) }}</p>
</div>
@enderror
