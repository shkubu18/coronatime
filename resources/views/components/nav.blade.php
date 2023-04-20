<nav class="mt-5 md:mt-8 pb-2 border-b-2 border-slate-50 pl-3 md:pl-0">
    <a
        class="text-lg mr-7 md:mr-16 pb-3 {{ request()->routeIs('dashboard.worldwide') ? ' border-b-4 border-black font-semibold ' : '' }}"
        href="{{ route('dashboard.worldwide') }}"
    >
        Worldwide
    </a>
    <a
        class="text-lg pb-3 {{ request()->routeIs('dashboard.by_country') ? ' border-b-4 border-black font-semibold ' : '' }}"
        href="{{ route('dashboard.by_country') }}"
    >
        By country
    </a>
</nav>
