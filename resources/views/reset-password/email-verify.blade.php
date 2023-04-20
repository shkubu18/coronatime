<x-layout>
    <x-reset-password.main-container>
        <x-logo class="w-fit" />

        <x-reset-password.container>
            <div>
                <h1 class="font-semibold text-2xl text-center sm:mt-36">Reset Password</h1>
                <form id="reset-password" class="w-full my-10" action="#" method="POST">
                    <x-form.input name="email" type="email" placeholder="Enter your email" />

                </form>
            </div>
            <x-form.button form="reset-password" class="mt-0" >RESET PASSWORD</x-form.button>
        </x-reset-password.container>
    </x-reset-password.main-container>
</x-layout>
