@props(['countries', 'totalNumbers'])

<div class="w-full border-2 border-gray-100 rounded-md shadow h-600 overflow-y-scroll mb-5 scrollbar scrollbar-thumb-gray-700 scrollbar-track-gray-100">
    <table class="w-full table-fixed">
        <thead class="bg-gray-100 text-sm sm:text-base sticky top-0">
        <tr>
            <th class="py-3 font-medium pl-2 md:pl-4">
                <div class="flex items-center justify-start">
                    <span class="mr-1.5">Location</span>
                    <div>
                        <a href="?sort_by=location&sort_order=asc">
                            <x-statistics.sort-up-svg name="location" />
                        </a>
                        <a href="?sort_by=location&sort_order=desc">
                            <x-statistics.sort-down-svg name="location" />
                        </a>
                    </div>
                </div>
            </th>
            <th class="py-3 font-medium pl-1 xs:pl-0">
                <div class="flex items-center justify-start">
                    <span class="mx-1" >New cases</span>
                    <div>
                        <a href="?sort_by=confirmed&sort_order=asc">
                            <x-statistics.sort-up-svg name="confirmed" />
                        </a>
                        <a href="?sort_by=confirmed&sort_order=desc">
                            <x-statistics.sort-down-svg name="confirmed" />
                        </a>
                    </div>
                </div>
            </th>
            <th class="py-3 font-medium pl-4 xs:pl-0">
                <div class="flex items-center justify-start">
                    <span class="mx-1">Deaths</span>
                    <div>
                        <a href="?sort_by=deaths&sort_order=asc">
                            <x-statistics.sort-up-svg name="deaths" />
                        </a>
                        <a href="?sort_by=deaths&sort_order=desc">
                            <x-statistics.sort-down-svg name="deaths" />
                        </a>
                    </div>
                </div>
            </th>
            <th class="py-3 font-medium md:w-2/5 pl-4 xs:pl-0">
                <div class="flex items-center justify-start">
                    <span class="mr-1">Recover</span>
                    <div>
                        <a href="?sort_by=recovered&sort_order=asc">
                            <x-statistics.sort-up-svg name="recovered" />
                        </a>
                        <a href="?sort_by=recovered&sort_order=desc">
                            <x-statistics.sort-down-svg name="recovered" />
                        </a>
                    </div>
                </div>
            </th>
        </tr>
        </thead>
        <tbody class="text-sm sm:text-base">
            <tr class="border-b-2 border-gray-100">
                <td class="py-3 pl-2 md:pl-4">Worldwide</td>
                <td class="py-3 pl-2 xs:pl-1">{{ $totalNumbers['totalCases'] }}</td>
                <td class="py-3 pl-4 xs:pl-1">{{ $totalNumbers['totalDeaths'] }}</td>
                <td class="py-3 pl-4 xs:pl-0">{{ $totalNumbers['totalRecovered'] }}</td>
            </tr>
            @foreach($countries as $country)
                <tr class="border-b-2 border-gray-100">
                    <td class="py-3 pl-2 md:pl-4">{{ json_decode($country->country)->en }}</td>
                    <td class="py-3 pl-2 xs:pl-1">{{ $country->confirmed }}</td>
                    <td class="py-3 pl-4 xs:pl-1">{{ $country->deaths }}</td>
                    <td class="py-3 pl-4 xs:pl-0">{{ $country->recovered }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
