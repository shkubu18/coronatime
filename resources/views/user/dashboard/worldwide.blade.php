<x-layout>
    <x-header/>
    <div class="mt-6 md:mt-12 md:px-24 pb-4">
        <h1 class="text-2xl font-semibold pl-3 md:pl-0">Worldwide Statistics</h1>
        <x-nav />
        <x-statistics.worldwide
            :totalNumbers="$totalNumbers"
        />
    </div>
</x-layout>
