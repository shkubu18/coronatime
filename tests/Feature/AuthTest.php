<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	public function test_the_login_page_is_accessible(): void
	{
		$response = $this->get(route('login.page'));
		$response->assertSuccessful();
		$response->assertSee(__('auth.first_heading'));
		$response->assertViewIs('auth.login');
	}

	public function test_auth_should_give_us_errors_if_input_is_not_provided(): void
	{
		$response = $this->post(route('login.page'));
		$response->assertSessionHasErrors(['username_or_email', 'password']);
	}

	public function test_auth_should_give_us_username_error_if_login_input_is_not_provided(): void
	{
		$response = $this->post(route('login'), ['password' => 'testing-password']);
		$response->assertSessionHasErrors(['username_or_email']);
	}

	public function test_auth_should_give_us_password_error_if_password_input_is_not_provided(): void
	{
		$response = $this->post(route('login'), ['username_or_email' => 'data shkubuliani']);
		$response->assertSessionHasErrors(['password']);
	}

	public function test_auth_should_give_us_login_input_error_if_login_input_is_less_then_three(): void
	{
		$response = $this->post(route('login'), [
			'username_or_email'    => 'da',
			'password'             => 'testing-password',
		]);

		$response->assertSessionHasErrors(['username_or_email']);
	}

	public function test_auth_should_give_us_auth_fail_error_if_such_user_does_not_exists(): void
	{
		$response = $this->post(route('login'), [
			'login_type'             => 'email',
			'username_or_email'      => 'nonexistentuser@example.com',
			'password'               => 'testing-password',
		]);

		$response->assertSessionHasErrors(['auth_fail']);
	}

	public function test_auth_should_give_us_email_verify_error_if_users_email_is_not_verified(): void
	{
		$username = 'data shkubuliani';
		$password = 'data123';

		$user = User::factory()->create([
			'email_verified_at' => null,
			'username'          => $username,
			'password'          => $password,
		]);

		$response = $this->post(route('login'), [
			'username_or_email'      => $username,
			'password'               => $password,
		]);

		$response->assertSessionHasErrors(['email_verify']);
	}

	public function test_auth_should_give_redirect_statistics_worldwide_page_after_successful_login(): void
	{
		$username = 'data shkubuliani';
		$password = 'data123';

		$user = User::factory()->create([
			'username'          => $username,
			'password'          => $password,
		]);

		$response = $this->post(route('login'), [
			'username_or_email'      => $username,
			'password'               => $password,
		]);

		$response->assertRedirectToRoute('worldwide_statistics.show');
	}

	public function test_auth_should_remember_user_if_user_checked_remember_checkbox(): void
	{
		$username = 'data shkubuliani';
		$password = 'data123';

		$user = User::factory()->create([
			'username'          => $username,
			'password'          => $password,
		]);

		$response = $this->post(route('login'), [
			'username_or_email'      => $username,
			'password'               => $password,
			'remember'               => 'on',
		]);

		$response->assertRedirectToRoute('worldwide_statistics.show');
		$this->assertNotNull(auth()->user()->remember_token);
	}

	public function test_user_can_logout(): void
	{
		$user = User::factory()->create();

		$this->actingAs($user);

		$response = $this->get(route('logout'));

		$response->assertRedirectToRoute('login.page');

		$this->assertGuest();
	}
}
