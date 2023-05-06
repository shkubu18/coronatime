<header class="flex items-center justify-between border-b-2 border-slate-50 md:px-20 p-4">
    <x-header.logo color="text-teal"/>
    <div class="flex items-center">
        <x-header.language-switcher />

        <div class="hidden sm:flex">
            <h1 class="font-semibold mx-4 border-r-2 border-light-gray pr-4">{{ ucwords(auth()->user()->username) }}</h1>
            <a href="{{ route('logout') }}">{{ __('header.logout') }}</a>
        </div>

        <div x-data="{show: false}">
            <x-header.menu-bar-svg />
            <div x-show="show" style="display: none" class="absolute bg-teal text-white text-center right-3 top-16 rounded px-4 py-2">
                <a @click="show = !show" href="{{ route('logout') }}">{{ __('header.logout') }}</a>
            </div>
        </div>
    </div>
</header>
