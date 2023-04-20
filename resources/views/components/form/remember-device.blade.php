<div class="flex justify-between text-sm">
    <div class="flex">
        <input
            class="w-5 h-5 rounded border-2 border-gray-200 mr-2"
            type="checkbox"
            name="remember_device"
            id="remember_device"
        >
        <label class="font-medium" for="remember_device">Remember this device</label>
    </div>
    <a class="text-indigo-700 font-medium" href="{{ route('password.verify_email') }}">Forgot password?</a>
</div>
