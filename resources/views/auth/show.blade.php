<x-layout>
    <div class="min-h-screen flex justify-between mx-2 sm:m-0">
        <div class="w-full flex items-center flex-col mt-4 lg:w-3/5 lg:items-start lg:pt-10 lg:pl-24 lg:mx-10">
            <x-logo />
            <div class="mt-12 w-fit">
                <h1 class="font-semibold text-3xl">Welcome back</h1>
                <p class="mt-2 text-gray-400 text-xl">Welcome back! Please enter your details</p>
                <form class="my-6" action="#" method="POST">

                    <x-form.input name="username" placeholder="Enter unique username or email" />
                    <x-form.input name="password" placeholder="Fill in password" />
                    <x-form.remember-device />
                    <x-form.button>LOG IN</x-form.button>

                    <div class="flex justify-center">
                        <p class="mr-1 text-gray-400">Don't have an account?</p>
                        <a class="ml-1 font-semibold" href="#">Sing up for free</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-2/5 h-screen hidden md:block">
            <img class="h-full w-full object-cover" src="./images/background-img.jpg" alt="vaccine bottles">
        </div>
    </div>
</x-layout>
