<div class="flex justify-between text-sm">
    <div class="flex">
        <input
            class="w-5 h-5 rounded border-2 border-gray-200 mr-2"
            type="checkbox"
            name="remember"
            id="remember"
        >
        <label class="font-medium" for="remember">Remember this device</label>
    </div>
    <a class="text-indigo-700 font-medium" href="{{ route('password.request') }}">Forgot password?</a>
</div>
