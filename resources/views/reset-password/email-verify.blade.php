<x-layout>
    <div class="w-full flex flex-col items-center mt-6">
        <x-logo/>

        <div class="mt-28 w-96">
            <h1 class="font-semibold text-2xl text-center">Reset Password</h1>
            <form class="my-10" action="#" method="POST">
                <x-form.input name="email" type="email" placeholder="Enter your email" />

                <x-form.button>RESET PASSWORD</x-form.button>
            </form>
        </div>
    </div>
</x-layout>
