<header class="flex items-center justify-between border-b-2 border-slate-50 md:px-20 p-4">
    <x-logo color="text-teal-400"/>
    <div class="flex">
        <div x-data="{ show: false }" class="relative px-2 cursor-pointer">
            <div class="flex items-center" @click="show = !show">
                <span>English</span>
                <img class="ml-2" src="{{ asset('assets/icons/down-arrow.png') }}">
            </div>
            <div x-show="show" class="absolute text-sm left-0 top-8 w-full text-white flex flex-col bg-indigo-500 rounded">
                <a @click="show = !show" class="p-1 text-center hover:bg-indigo-700 duration-300 hover:rounded" href="#">
                    Georgian
                </a>
            </div>
        </div>

        <div class="hidden sm:flex">
            <h1 class="font-semibold mx-4 border-r-2 pr-4">Davit Shkubuliani</h1>
            <a href="#">Log Out</a>
        </div>
        <img class="ml-4 w-6 sm:hidden" src="{{ asset('assets/icons/menu-bar.png') }}" alt="menu bar">
    </div>
</header>
