<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class LanguageTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */
	public function test_locale_should_change_based_on_what_language_is_present_in_request_end_also_it_should_stored_in_session(): void
	{
		$language = 'ka';

		$response = $this->get('/locale/' . $language, ['language' => $language]);

		$response->assertRedirect();

		$this->assertEquals($language, App::getLocale());

		$this->assertEquals($language, Session::get('locale'));
	}
}
