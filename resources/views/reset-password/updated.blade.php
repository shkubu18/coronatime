<x-layout>
    <div class="w-fit m-auto h-screen flex flex-col items-start justify-between sm:justify-start sm:items-center py-6 px-2">
        <x-logo class="mb-0" />

        <div class="flex flex-col items-center sm:mt-56">
            <img src="./images/checkmark.gif">
            <p class="mt-2 text-lg text-center">Your password has been updated successfully</p>
        </div>

        <a class="w-full mt-12" href="{{ route('login.page') }}"><x-form.button>SIGN IN</x-form.button></a>
    </div>
</x-layout>
