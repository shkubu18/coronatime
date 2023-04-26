<?php

namespace App\Http\Controllers;

use App\Models\CovidStatistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CovidStatisticController extends Controller
{
	public function worldwideStatistics(): View
	{
		return view('user.dashboard.worldwide', [
			'totalNumbers'   => $this->getTotalNumbers(),
		]);
	}

	public function statisticsByCountry(Request $request): View
	{
		$search = $request->input('search');

		$sortOrder = $request->input('sort_order', 'asc');
		$sortBy = $request->input('sort_by', 'location');

		$query = CovidStatistic::query();

		if ($search)
		{
			$search = strtolower($search);
			$query->whereRaw('LOWER(country) LIKE ?', ['%' . $search . '%']);
		}

		if (in_array($sortBy, ['confirmed', 'deaths', 'recovered']))
		{
			$query->orderBy($sortBy, $sortOrder);
		}
		else
		{
			$query->orderBy('id', $sortOrder);
		}

		return view('user.dashboard.by-country', [
			'countries'      => $query->get(),
			'totalNumbers'   => $this->getTotalNumbers(),
		]);
	}

	private function getTotalNumbers(): array
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
