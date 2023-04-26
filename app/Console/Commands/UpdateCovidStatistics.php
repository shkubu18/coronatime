<?php

namespace App\Console\Commands;

use App\Models\CovidStatistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateCovidStatistics extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'covid:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Update COVID-19 statistics for all countries';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		$countries = Http::get('https://devtest.ge/countries')->json();

		foreach ($countries as $country)
		{
			$countryStats = Http::post('https://devtest.ge/get-country-statistics', [
				'code' => $country['code'],
			])->json();

			CovidStatistic::updateOrCreate(
				[
					'country_code' => $country['code'],
					'country'      => json_encode([
						'en' => $country['name']['en'],
						'ka' => $country['name']['ka'],
					]),
					'confirmed' => $countryStats['confirmed'],
					'recovered' => $countryStats['recovered'],
					'deaths'    => $countryStats['deaths'],
				]
			);
		}

		$this->info('Covid statistics updated successfully!');
	}
}
