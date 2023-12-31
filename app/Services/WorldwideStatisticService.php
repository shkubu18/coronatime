<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class WorldwideStatisticService
{
	public static function getTotalNumbers(): array
	{
		$totalNumbers = DB::table('covid_statistics')
			->select(DB::raw('SUM(confirmed) as total_cases, SUM(recovered) as total_recovered, SUM(deaths) as total_deaths'))
			->get()
			->first();

		return [
			'totalCases'     => number_format($totalNumbers->total_cases),
			'totalRecovered' => number_format($totalNumbers->total_recovered),
			'totalDeaths'    => number_format($totalNumbers->total_deaths),
		];
	}
}
