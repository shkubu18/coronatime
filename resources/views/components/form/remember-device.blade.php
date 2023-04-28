<div class="flex justify-between text-sm">
    <div class="flex">
        <input
            class="w-5 h-5 rounded border-2 border-light-gray mr-2 text-input-green focus:ring-input-green"
            type="checkbox"
            name="remember"
            id="remember"
        >
        <label class="font-medium" for="remember">{{ __('auth.remember_device') }}</label>
    </div>
    <a class="text-blue font-medium" href="{{ route('password.request') }}">{{ __('auth.forgot_password') }}</a>
</div>
