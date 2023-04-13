<x-layout>
    <div class="min-h-screen flex justify-between mx-2 sm:m-0">
        <div class="w-full flex items-center flex-col mt-4 lg:w-3/5 lg:items-start lg:pt-6 lg:pl-24 lg:mx-10">
            <x-logo />
            <div class="mt-11 w-fit">
                <h1 class="font-semibold text-3xl">Welcome to Coronatime</h1>
                <p class="mt-2 text-gray-400 text-xl">Please enter required info to sing up</p>
                <form class="my-6" action="#" method="POST">

                    <x-form.input name="username" hint="sing_up" type="text" placeholder="Enter unique username" />
                    <x-form.input name="email" type="email" placeholder="Enter your email" />
                    <x-form.input name="password" type="password" placeholder="Fill in password" />
                    <x-form.input name="repeated_password" type="password" placeholder="Repeat password" />

                    <x-form.button>SIGN UP</x-form.button>
                </form>
                <div class="flex justify-center">
                    <p class="mr-1 text-gray-400">Already have an account?</p>
                    <a class="ml-1 font-semibold" href="{{ route('auth.show') }}">Log in</a>
                </div>
            </div>
        </div>
        <div
            class="bg-cover bg-no-repeat bg-center w-2/5 min-h-full hidden md:flex md:items-end"
            style="background-image: url('./images/background-img.jpg')">
        </div>
    </div>
</x-layout>
