<nav class="mt-5 md:mt-8 pb-2 border-b-2 border-slate-50 pl-3 md:pl-0">
    <a
        class="text-lg mr-7 md:mr-16 pb-3 {{ request()->routeIs('statistics.worldwide') ? ' border-b-4 border-black font-semibold ' : '' }}"
        href="{{ route('statistics.worldwide') }}"
    >
        {{ __('statistics.worldwide') }}
    </a>
    <a
        class="text-lg pb-3 {{ request()->routeIs('statistics.by_country') ? ' border-b-4 border-black font-semibold ' : '' }}"
        href="{{ route('statistics.by_country') }}"
    >
        {{ __('statistics.by_country') }}
    </a>
</nav>
