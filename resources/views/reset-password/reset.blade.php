<x-layout>
    <x-reset-password.main-container>
        <x-logo class="w-fit" />

        <x-reset-password.container>
            <div>
                <h1 class="font-semibold text-2xl text-center sm:mt-36">Reset Password</h1>
                <form id="update-password" class="w-full my-10" action="#" method="POST">
                    <x-form.input name="new_password" type="password" placeholder="Enter new password" />
                    <x-form.input name="repeated_password" type="password" placeholder="Repeat password" />

                </form>
            </div>
            <x-form.button form="update-password" class="mt-0" >SAVE CHANGES</x-form.button>
        </x-reset-password.container>
    </x-reset-password.main-container>
</x-layout>
