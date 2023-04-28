<button
    {{ $attributes(['class' => 'bg-green text-white w-full p-3 rounded-md font-bold mt-6']) }}
    type="submit"
    {{ $attributes }}
>
    {{ $slot }}
</button>
