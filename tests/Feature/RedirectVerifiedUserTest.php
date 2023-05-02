<?php

namespace Tests\Feature;

use App\Listeners\RedirectVerifiedUser;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RedirectVerifiedUserTest extends TestCase
{
	use RefreshDatabase;

	public function test_users_email_should_be_verified_when_redirect_verified_user_event_litener_runs(): void
	{
		$user = User::factory()->create([
			'email_verified_at' => null,
		]);

		$event = new Verified($user);

		$response = app(RedirectVerifiedUser::class)->handle($event);

		$this->assertTrue($user->hasVerifiedEmail());
	}
}
