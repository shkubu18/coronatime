@props(['name'])

<div class="h-4 absolute top-3.5 right-3
    @if($name === 'username_or_email')
        {{ old($name) && !$errors->has('auth_fail') ? 'block' : 'hidden' }}
        {{ old($name) && !$errors->has('email_verify') ? 'block' : 'hidden' }}
        @else
        {{ old($name) && !$errors->has($name) ? 'block' : 'hidden' }}
    @endif">
    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9.003 14L16.073 6.929L14.659 5.515L9.003 11.172L6.174 8.343L4.76 9.757L9.003 14Z" fill="#249E2C"/>
    </svg>
</div>