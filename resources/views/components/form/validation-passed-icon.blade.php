@props(['name'])

<img
    class="h-4 absolute top-4 right-3
    @if($name === 'username_or_email')
        {{ old($name) && !$errors->has('auth_fail') ? 'block' : 'hidden' }}
        {{ old($name) && !$errors->has('email_verify') ? 'block' : 'hidden' }}
        @else
        {{ old($name) && !$errors->has($name) ? 'block' : 'hidden' }}
    @endif"
    src="{{ asset('./assets/icons/input-checkmark.png') }}"
    alt="checkmark icon"
/>
