@props(['totalNumbers'])

<div class="w-full grid gap-5 grid-cols-2 md:grid-cols-3 px-3 md:px-0 mt-8 md:mt-16">
    <div class="flex flex-col items-center p-10 bg-light-blue rounded-xl w-full col-start-1 col-end-3 md:col-end-2">
        <div class="relative mb-6">
            <img src="{{ asset('assets/images/blue-vector1.png') }}">
            <img class="absolute top-0" src="{{ asset('assets/images/blue-vector2.png') }}">
        </div>
        <h2 class="mb-4 text-lg font-medium">{{ __('statistics.new_cases') }}</h2>
        <h1 class="font-semibold text-4xl text-blue">{{ $totalNumbers['totalCases'] }}</h1>
    </div>
    <div class="flex flex-col items-center p-10 bg-light-green rounded-xl w-full">
        <div class="relative mb-8">
            <img src="{{ asset('assets/images/green-vector1.png') }}">
            <img class="absolute top-0" src="{{ asset('assets/images/green-vector2.png') }}">
        </div>
        <h2 class="mb-4 text-lg font-medium">{{ __('statistics.worldwide_recover') }}</h2>
        <h1 class="font-semibold text-4xl text-green">{{ $totalNumbers['totalRecovered'] }}</h1>
    </div>
    <div class="flex flex-col items-center p-10 bg-light-yellow rounded-xl w-full">
        <div class="relative mb-8">
            <img src="{{ asset('assets/images/yellow-vector1.png') }}">
            <img class="absolute top-0" src="{{ asset('assets/images/yellow-vector2.png') }}">
        </div>
        <h2 class="mb-4 text-lg font-medium">{{ __('statistics.worldwide_death') }}</h2>
        <h1 class="font-semibold text-4xl text-yellow">{{ $totalNumbers['totalDeaths'] }}</h1>
    </div>
</div>
