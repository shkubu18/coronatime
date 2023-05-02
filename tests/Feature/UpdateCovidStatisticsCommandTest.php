<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UpdateCovidStatisticsCommandTest extends TestCase
{
	use RefreshDatabase;

	public function test_command_should_update_covid_statistics_successfully(): void
	{
		Http::fake([
			'https://devtest.ge/countries' => Http::response([
				['code' => 'US', 'name' => ['en' => 'United States', 'ka' => 'აშშ']],
				['code' => 'CA', 'name' => ['en' => 'Canada', 'ka' => 'კანადა']],
			]),
			'https://devtest.ge/get-country-statistics' => Http::sequence()
				->push([
					'confirmed' => 100,
					'recovered' => 80,
					'deaths'    => 10,
				])
				->push([
					'confirmed' => 200,
					'recovered' => 150,
					'deaths'    => 20,
				]),
		]);

		$this->artisan('covid:update')->expectsOutput('Covid statistics updated successfully!');

		$this->assertDatabaseHas('covid_statistics', [
			'country_code' => 'US',
			'country'      => '{"en":"United States","ka":"\u10d0\u10e8\u10e8"}',
			'confirmed'    => 100,
			'recovered'    => 80,
			'deaths'       => 10,
		]);

		$this->assertDatabaseHas('covid_statistics', [
			'country_code' => 'CA',
			'country'      => '{"en":"Canada","ka":"\u10d9\u10d0\u10dc\u10d0\u10d3\u10d0"}',
			'confirmed'    => 200,
			'recovered'    => 150,
			'deaths'       => 20,
		]);
	}
}
