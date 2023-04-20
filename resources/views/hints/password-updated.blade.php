<x-layout>
    <x-hints.container>
        <x-logo class="mb-0" />

        <div class="flex flex-col items-center sm:mt-56">
            <img src="{{ asset('assets/images/checkmark.gif') }}" alt="confirmation icon">
            <p class="mt-2 text-lg text-center">Your password has been updated successfully</p>
        </div>

        <a class="w-full mt-12" href="{{ route('login.page') }}"><x-form.button>SIGN IN</x-form.button></a>
    </x-hints.container>
</x-layout>
