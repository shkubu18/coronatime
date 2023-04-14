@props(['name'])

<label for="{{ $name }}" class="font-semibold block mb-1">
    @if($name === 'new_password')
        New password
    @elseif($name === 'repeated_password')
        Repeated password
    @else
        {{ ucwords($name) }}
    @endif
</label>
