<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
	use RefreshDatabase;

	public function test_users_email_should_verified_when_user_clicks_verify_email_button_from_received_email(): void
	{
		$user = User::factory()->create();

		Event::fake();

		$response = $this->get(route('verification.verify', [
			'token'   => $user->email_verification_token,
			'hash'    => hash('sha256', 'hashed-text'),
		]));

		Event::assertDispatched(Verified::class);

		$this->assertNotNull($user->email_verified_at);

		$response->assertRedirect(route('verification.notice'));
	}
}
