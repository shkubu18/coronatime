<div x-data="{ show: false }" class="relative mr-2 cursor-pointer">
    <div class="flex items-center" @click="show = !show">
        <span>{{ app()->getLocale() === 'en' ? __('header.english') : __('header.georgia') }}</span>
        <img class="ml-2" src="{{ asset('assets/icons/down-arrow.png') }}">
    </div>
    <div x-show="show" style="display: none" class="absolute text-sm left-0 top-8 w-full text-white flex flex-col bg-teal rounded">
        <a
            @click="show = !show"
            class="p-1 text-center hover:bg-blue duration-300 hover:rounded"
            href="{{ route('locale.set', ['language' => app()->getLocale() === 'en' ? 'ka' : 'en']) }}"
        >
            {{ app()->getLocale() === 'en' ? __('header.georgia') : __('header.english') }}
        </a>
    </div>
</div>
