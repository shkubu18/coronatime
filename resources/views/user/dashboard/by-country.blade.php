<x-layout>
    <x-header/>
    <div class="mt-6 md:mt-12 md:px-24 pb-4">
        <h1 class="text-2xl font-semibold pl-3 md:pl-0">Statistics by country</h1>
        <x-nav />
        <div class="relative my-3 md:my-10 md:w-72">
            <form method="GET" action="{{ route('dashboard.by_country') }}">
                <input class="rounded-xl p-3 pl-12 md:pl-16 w-full border-0 md:border-2 md:border-gray-100"
                       type="text"
                       name="search"
                       placeholder="Search by country"
                       value="{{ request()->query('search') }}"
                >
            </form>
            <img class="absolute top-3.5 sm:top-4 left-4 sm:left-6" src="{{ asset('assets/icons/search-icon.png') }}" alt="search icon">
        </div>
        <x-statistics.by-country
            :countries="$countries"
            :totalNumbers="$totalNumbers"
        />
    </div>
</x-layout>
