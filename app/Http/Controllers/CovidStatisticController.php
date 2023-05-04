<?php

namespace App\Http\Controllers;

use App\Models\CovidStatistic;
use App\Services\WorldwideStatisticService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CovidStatisticController extends Controller
{
	public function worldwideStatistics(): View
	{
		return view('user.statistics.worldwide', [
			'totalNumbers'   => WorldwideStatisticService::getTotalNumbers(),
		]);
	}

	public function statisticsByCountry(Request $request): View
	{
		$query = CovidStatistic::query();

		$query->search($request->input('search'));
		$query->sort($request->input('sort_by', 'location'), $request->input('sort_order', 'asc'));

		return view('user.statistics.by-country', [
			'countries'      => $query->get(),
			'totalNumbers'   => WorldwideStatisticService::getTotalNumbers(),
		]);
	}
}
