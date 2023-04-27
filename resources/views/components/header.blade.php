<header class="flex items-center justify-between border-b-2 border-slate-50 md:px-20 p-4">
    <x-logo color="text-teal-400"/>
    <div class="flex">
        <x-language-switcher />

        <div class="hidden sm:flex">
            <h1 class="font-semibold mx-4 border-r-2 pr-4">{{ ucwords(auth()->user()->username) }}</h1>
            <a href="{{ route('logout') }}">Log Out</a>
        </div>

        <div x-data="{show: false}">
            <img
                @click="show = !show"
                class="ml-4 w-6 sm:hidden cursor-pointer"
                src="{{ asset('assets/icons/menu-bar.png') }}"
                alt="menu bar"
            />
            <div x-show="show" style="display: none" class="absolute bg-teal-400 text-white text-center right-3 top-16 rounded px-4 py-2">
                <a @click="show = !show" href="#">Log Out</a>
            </div>
        </div>
    </div>
</header>
