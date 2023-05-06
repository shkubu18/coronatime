<x-layout>
    <x-header/>
    <div class="mt-6 md:mt-12 md:px-24 pb-4">
        <h1 class="text-2xl font-semibold pl-3 md:pl-0">{{ __('statistics.by_country_header') }}</h1>
        <x-nav />
        <div class="relative my-3 md:my-10 md:w-72">
            <form method="GET" action="{{ route('by_country_statistics.show') }}">
                <input class="rounded-xl p-3 pl-12 md:pl-16 w-full border-0 md:border-2 md:border-light-gray"
                       type="text"
                       name="search"
                       placeholder="{{ __('statistics.search_placeholder') }}"
                       value="{{ request()->query('search') }}"
                >
            </form>
        <x-statistics.input-search-svg />
        </div>
        <x-statistics.by-country
            :countries="$countries"
            :totalNumbers="$totalNumbers"
        />
    </div>
</x-layout>
