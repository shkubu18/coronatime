<x-layout>
    <x-reset-password.main-container>
        <x-header.logo class="w-fit" />

        <x-reset-password.container>
            <div>
                <h1 class="font-semibold text-2xl text-center sm:mt-36">{{ __('reset-password.reset_password') }}</h1>
                <form id="reset-password" class="w-full my-10" action="{{ route('password.email') }}" method="POST">
                    @csrf

                    <x-form.input
                        name="email"
                        type="text"
                        label="reset-password.email"
                        placeholder="{{ __('reset-password.email_placeholder') }}"
                    />

                    @error('password_reset_email_fail')
                    <div class="flex items-center mt-2 ml-1">
                        <x-form.warning-svg />
                        <p class="text-warning-color">{{ __($message) }}</p>
                    </div>
                    @enderror

                </form>
            </div>
            <x-form.button form="reset-password" class="mt-0" >{{ __('reset-password.reset_password') }}</x-form.button>
        </x-reset-password.container>
    </x-reset-password.main-container>
</x-layout>
