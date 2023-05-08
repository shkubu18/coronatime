<x-layout>
    <div class="min-h-screen flex justify-between mx-2 md:m-0">
        <div class="w-full flex items-center flex-col py-6 lg:w-3/5 lg:items-start lg:pl-24 lg:mx-10">
            <div class="w-fit">
                <x-header.logo class="mb-12" />
                <h1 class="font-semibold text-2xl lg:text-3xl">{{ __('auth.first_heading') }}</h1>
                <p class="mt-2 text-gray text-lg lg:text-xl">{{ __('auth.second_heading') }}</p>
                <div class="md:w-422">
                    <form class="my-6" action="/login" method="POST">
                        @csrf

                        <x-form.input
                            name="username_or_email"
                            type="text"
                            label="auth.username"
                            placeholder="{{ __('auth.username_placeholder') }}"
                        />
                        <x-form.input
                            name="password"
                            type="password"
                            label="auth.password"
                            placeholder="{{ __('auth.password_placeholder') }}"
                        />

                        @error('auth_fail')
                        <div class="flex items-center mb-5 ml-1">
                            <x-form.warning-svg />
                            <p class="text-red-700">{{ __('auth.auth_fail') }}</p>
                        </div>
                        @enderror
                        @error('email_verify')
                        <div class="flex items-center mb-5 ml-1">
                            <x-form.warning-svg />
                            <p class="text-red-700">{{ __('auth.email_verify') }}</p>
                        </div>
                        @enderror

                        <x-form.remember-device />

                        <x-form.button>{{ __('auth.login') }}</x-form.button>
                    </form>
                    <div class="flex justify-center">
                        <p class="mr-1 text-gray">{{ __('auth.dont_have_account') }}</p>
                        <a class="ml-1 font-semibold" href="{{ route('register.show') }}">{{ __('auth.sign_up') }}</a>
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
