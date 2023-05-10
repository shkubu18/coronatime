<div class="flex justify-between text-sm">
    <div class="flex items-center">
        <input
            class="w-5 h-5 rounded border-2 border-light-gray mr-2 text-input-green focus:ring-input-green"
            type="checkbox"
            name="remember"
            id="remember"
        >
        <label class="font-medium {{ app()->getLocale() === 'ka' ? 'text-xs sm:text-sm' : ''}}" for="remember">
            {{ __('auth.remember_device') }}
        </label>
    </div>
    <div class="flex items-center">
        <a class="text-right ml-2 text-blue font-bold {{ app()->getLocale() === 'ka' ? 'text-xs sm:text-sm' : ''}}" href="{{ route('password.request') }}">
            {{ __('auth.forgot_password') }}
        </a>
    </div>
</div>
