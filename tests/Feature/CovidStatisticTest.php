<?php

namespace Tests\Feature;

use App\Models\CovidStatistic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CovidStatisticTest extends TestCase
{
	use RefreshDatabase;

	public function test_covid_statistic_should_return_statistics_worldwide_page_with_total_numbers(): void
	{
		$user = User::factory()->create();

		CovidStatistic::create([
			'country_code' => 'US',
			'country'      => '{"en":"World","ka":"აშშ"}',
			'confirmed'    => 100,
			'recovered'    => 50,
			'deaths'       => 10,
		]);

		$response = $this->actingAs($user)->get(route('worldwide_statistics.show'));

		$response->assertStatus(200);

		$response->assertViewHas('totalNumbers');
	}

	public function test_covid_statistics_should_return_statistics_by_country_page_with_all_countries_and_total_numbers()
	{
		$user = User::factory()->create();

		CovidStatistic::create([
			'country_code' => 'US',
			'country'      => '{"en":"United States","ka":"\u10d0\u10e8\u10e8"}',
			'confirmed'    => 100,
			'recovered'    => 80,
			'deaths'       => 10,
		]);

		$response = $this->actingAs($user)->get(route('by_country_statistics.show'));

		$response->assertStatus(200);

		$response->assertViewHas('totalNumbers');

		$response->assertSee('United States');
		$response->assertSee('100');
		$response->assertSee('80');
		$response->assertSee('10');
	}
}
