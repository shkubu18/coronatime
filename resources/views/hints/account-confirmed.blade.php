<x-layout>
    <x-hints.container>
        <x-logo class="mb-0" />

        <div class="flex flex-col items-center sm:mt-56">
            <img src="./images/checkmark.gif">
            <p class="mt-2 text-lg text-center">Your account is confirmed, you can sign in</p>
        </div>

        <a class="w-full mt-12" href="{{ route('login.page') }}"><x-form.button>SIGN IN</x-form.button></a>
    </x-hints.container>
</x-layout>
