<x-layout>
    <x-reset-password.main-container>
        <x-logo class="w-fit" />

        <x-reset-password.container>
            <div>
                <h1 class="font-semibold text-2xl text-center sm:mt-36">Reset Password</h1>
                <form id="update-password" class="w-full my-10" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <x-form.input name="password" type="password" placeholder="Enter new password" />
                    <x-form.input name="password_confirmation" type="password" placeholder="Repeat password" />
                </form>
            </div>
            <x-form.button form="update-password" class="mt-0" >SAVE CHANGES</x-form.button>
        </x-reset-password.container>
    </x-reset-password.main-container>
</x-layout>
