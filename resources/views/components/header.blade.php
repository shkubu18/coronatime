<header class="flex items-center justify-between">
    <x-logo class="text-black"/>
    <div class="flex">
        <div x-data="{ show: false }" class="relative px-2 cursor-pointer">
            <div class="flex items-center" @click="show = !show">
                <span>English</span>
                <img class="ml-2" src="./images/down-arrow.png">
            </div>
            <div x-show="show" class="absolute text-sm left-0 top-8 w-full text-white flex flex-col bg-indigo-500 rounded">
                <a @click="show = !show" class="p-1 text-center hover:bg-indigo-700 duration-300 hover:rounded" href="#">
                    Georgian
                </a>
            </div>
        </div>

        <h1 class="font-semibold mx-4 border-r-2 pr-4">Davit Shkubuliani</h1>
        <a href="#">Log Out</a>
    </div>
</header>
