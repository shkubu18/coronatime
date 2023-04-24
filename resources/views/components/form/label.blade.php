@props(['name'])

<label for="{{ $name }}" class="font-semibold block mb-1">
    @if($name === 'new_password')
        New password
    @elseif($name === 'password_confirmation')
        Repeat password
    @else
        {{ ucwords($name) }}
    @endif
</label>
