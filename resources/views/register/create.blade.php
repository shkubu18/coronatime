<x-layout>
    <div class="min-h-screen flex justify-between mx-2 md:m-0">
        <div class="w-full flex items-center flex-col py-6 lg:w-3/5 lg:items-start lg:pl-24 lg:mx-10">
            <div class="w-fit">
                <x-logo class="mb-10" />
                <h1 class="font-semibold text-2xl lg:text-3xl">{{ __('register.first_heading') }}</h1>
                <p class="mt-2 text-gray text-lg lg:text-xl">{{ __('register.second_heading') }}</p>
                <div class="md:w-96">
                    <form class="my-6" action="/registration" method="POST">
                        @csrf

                        <x-form.input
                            name="username"
                            hint="sing_up"
                            type="text"
                            label="register.username"
                            placeholder="{{ __('register.username_placeholder') }}"
                        />
                        <x-form.input
                            name="email"
                            type="text"
                            label="register.email"
                            placeholder="{{ __('register.email_placeholder') }}"
                        />
                        <x-form.input
                            name="password"
                            type="password"
                            label="register.password"
                            placeholder="{{ __('register.password_placeholder') }}"
                        />
                        <x-form.input
                            name="password_confirmation"
                            type="password"
                            label="register.repeat_password"
                            placeholder="{{ __('register.repeat_password') }}"
                        />

                        <x-form.button>{{ __('register.sign_up') }}</x-form.button>
                    </form>
                    <div class="flex justify-center">
                        <p class="mr-1 text-gray">{{ __('register.already_have_account') }}</p>
                        <a class="ml-1 font-semibold" href="{{ route('login.page') }}">{{ __('register.login') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="bg-cover bg-no-repeat bg-center w-2/5 min-h-full hidden md:flex md:items-end"
            style="background-image: url('./assets/images/background-img.jpg')">
        </div>
    </div>
</x-layout>
