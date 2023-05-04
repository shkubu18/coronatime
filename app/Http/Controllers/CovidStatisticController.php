<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryFilterRequest;
use App\Models\CovidStatistic;
use App\Services\WorldwideStatisticService;
use Illuminate\View\View;

class CovidStatisticController extends Controller
{
	public function worldwideStatistics(): View
	{
		return view('user.statistics.worldwide', [
			'totalNumbers'   => WorldwideStatisticService::getTotalNumbers(),
		]);
	}

	public function statisticsByCountry(CountryFilterRequest $request): View
	{
		$query = CovidStatistic::search($request->search)
			->sort($request->input('sort_by', 'location'), $request->input('sort_order', 'asc'));

		return view('user.statistics.by-country', [
			'countries'      => $query->get(),
			'totalNumbers'   => WorldwideStatisticService::getTotalNumbers(),
		]);
	}
}
