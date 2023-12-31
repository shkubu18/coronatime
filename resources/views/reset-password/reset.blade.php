<x-layout>
    <x-reset-password.main-container>
        <x-header.logo class="w-fit" />

        <x-reset-password.container>
            <div>
                <h1 class="font-semibold text-2xl text-center sm:mt-36">{{ __('reset-password.reset_password') }}</h1>
                <form id="update-password" class="w-full my-10" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <x-form.input
                        name="password"
                        type="password"
                        label="reset-password.password"
                        placeholder="{{ __('reset-password.password_placeholder') }}"
                    />
                    <x-form.input
                        name="password_confirmation"
                        type="password"
                        label="reset-password.password_confirmation"
                        placeholder="{{ __('reset-password.password_confirmation') }}"
                    />
                </form>
            </div>
            <x-form.button form="update-password" class="mt-0" >{{ __('reset-password.save_changes') }}</x-form.button>
        </x-reset-password.container>
    </x-reset-password.main-container>
</x-layout>
