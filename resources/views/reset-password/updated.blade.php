<x-layout>
    <div class="w-fit m-auto flex flex-col items-center pt-6 px-2">
        <x-logo/>

        <img class="mt-52" src="./images/checkmark.gif">
        <p class="mt-2 text-lg text-center">Your password has been updated successfully</p>
        <a class="w-full mt-12" href="{{ route('login.page') }}"><x-form.button>SIGN IN</x-form.button></a>
    </div>
</x-layout>
