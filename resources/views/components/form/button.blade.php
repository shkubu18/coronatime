<button
    {{ $attributes(['class' => 'bg-green-500 text-white w-full p-3 rounded-md font-bold mt-6']) }}
    type="submit"
    {{ $attributes }}
>
    {{ $slot }}
</button>
