<x-layout>
    <div class="min-h-screen flex justify-between mx-2 sm:m-0">
        <div class="w-full flex items-center flex-col py-6 lg:w-3/5 lg:items-start lg:pl-24 lg:mx-10">
            <div class="w-fit">
                <x-logo class="mb-10" />
                <h1 class="font-semibold text-2xl lg:text-3xl">Welcome back</h1>
                <p class="mt-2 text-gray-400 text-lg lg:text-xl">Welcome back! Please enter your details</p>
                <form class="my-6" action="#" method="POST">

                    <x-form.input name="username" type="text" placeholder="Enter unique username or email" />
                    <x-form.input name="password" type="text" placeholder="Fill in password" />
                    <x-form.remember-device />

                    <x-form.button>LOG IN</x-form.button>
                </form>
                <div class="flex justify-center">
                    <p class="mr-1 text-gray-400">Don't have an account?</p>
                    <a class="ml-1 font-semibold" href="{{ route('register.page') }}">Sing up for free</a>
                </div>
            </div>
        </div>
        <div
            class="bg-cover bg-no-repeat bg-center w-2/5 min-h-full hidden md:flex md:items-end"
            style="background-image: url('./assets/images/background-img.jpg')">
        </div>
    </div>
</x-layout>
