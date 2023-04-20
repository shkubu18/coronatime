<div x-data="{ show: false }" class="relative mr-2 cursor-pointer">
    <div class="flex items-center" @click="show = !show">
        <span>English</span>
        <img class="ml-2" src="{{ asset('assets/icons/down-arrow.png') }}">
    </div>
    <div x-show="show" class="absolute text-sm left-0 top-8 w-full text-white flex flex-col bg-teal-400 rounded">
        <a @click="show = !show" class="p-1 text-center hover:bg-indigo-600 duration-300 hover:rounded" href="#">
            Georgian
        </a>
    </div>
</div>
