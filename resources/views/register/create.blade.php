<x-layout>
    <div class="min-h-screen flex justify-between mx-2 sm:m-0">
        <div class="w-full flex items-center flex-col py-6 lg:w-3/5 lg:items-start lg:pl-24 lg:mx-10">
            <div class="w-fit sm:w-96">
                <x-logo class="mb-10" />
                <h1 class="font-semibold text-2xl lg:text-3xl">Welcome to Coronatime</h1>
                <p class="mt-2 text-gray-400 text-lg lg:text-xl">Please enter required info to sing up</p>
                <form class="my-6" action="/registration" method="POST">
                    @csrf

                    <x-form.input name="username" hint="sing_up" type="text" placeholder="Enter unique username" />
                    <x-form.input name="email" type="email" placeholder="Enter your email" />
                    <x-form.input name="password" type="password" placeholder="Fill in password" />
                    <x-form.input name="password_confirmation" type="password" placeholder="Repeat password" />

                    <x-form.button>SIGN UP</x-form.button>
                </form>
                <div class="flex justify-center">
                    <p class="mr-1 text-gray-400">Already have an account?</p>
                    <a class="ml-1 font-semibold" href="{{ route('login.page') }}">Log in</a>
                </div>
            </div>
        </div>
        <div
            class="bg-cover bg-no-repeat bg-center w-2/5 min-h-full hidden md:flex md:items-end"
            style="background-image: url('./assets/images/background-img.jpg')">
        </div>
    </div>
</x-layout>
