<nav class="mt-5 md:mt-8 pb-2 border-b-2 border-slate-50 pl-3 md:pl-0">
    <a
        class="text-lg mr-7 md:mr-16 pb-3 {{ request()->routeIs('worldwide_statistics.show') ? ' border-b-4 border-black font-semibold ' : '' }}"
        href="{{ route('worldwide_statistics.show') }}"
    >
        {{ __('statistics.worldwide') }}
    </a>
    <a
        class="text-lg pb-3 {{ request()->routeIs('by_country_statistics.show') ? ' border-b-4 border-black font-semibold ' : '' }}"
        href="{{ route('by_country_statistics.show') }}"
    >
        {{ __('statistics.by_country') }}
    </a>
</nav>
