<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
	use RefreshDatabase;

	public function test_the_register_page_is_accessible(): void
	{
		$response = $this->get('/registration');
		$response->assertSuccessful();
		$response->assertSee(__('register.first_heading'));
		$response->assertViewIs('register.create');
	}

	public function test_register_should_give_us_errors_if_input_is_not_provided(): void
	{
		$response = $this->post('/registration');
		$response->assertSessionHasErrors(['username', 'email', 'password']);
	}

	public function test_register_should_give_us_username_error_if_username_input_is_not_provided(): void
	{
		$response = $this->post('/registration', [
			'email'                 => 'example@gmail.com',
			'password'              => 'testing-password',
			'password_confirmation' => 'testing-password',
		]);

		$response->assertSessionHasErrors(['username']);
	}

	public function test_register_should_give_us_email_error_if_email_input_is_not_provided(): void
	{
		$response = $this->post('/registration', [
			'username'              => 'name surname',
			'password'              => 'testing-password',
			'password_confirmation' => 'testing-password',
		]);

		$response->assertSessionHasErrors(['email']);
	}

	public function test_register_should_give_us_password_error_if_password_input_is_not_provided(): void
	{
		$response = $this->post('/registration', [
			'username'              => 'name surname',
			'email'                 => 'example@gmail.com',
		]);

		$response->assertSessionHasErrors(['password']);
	}

	public function test_register_should_give_us_password_confirmation_error_if_password_confirmation_input_is_not_provided_when_password_input_is_exists(): void
	{
		$response = $this->post('/registration', [
			'username'              => 'name surname',
			'email'                 => 'example@gmail.com',
			'password'              => 'testing-password',
		]);

		$response->assertSessionHasErrors(['password_confirmation']);
	}

	public function test_register_should_give_us_username_error_if_username_input_is_less_then_three(): void
	{
		$response = $this->post('/registration', [
			'username'              => 'na',
			'email'                 => 'example@gmail.com',
			'password'              => 'testing-password',
			'password_confirmation' => 'testing-password',
		]);

		$response->assertSessionHasErrors(['username']);
	}

	public function test_register_should_give_us_email_error_if_email_input_does_not_match_valid_email_format(): void
	{
		$response = $this->post('/registration', [
			'username'              => 'name username',
			'email'                 => 'invalid-email',
			'password'              => 'testing-password',
			'password_confirmation' => 'testing-password',
		]);

		$response->assertSessionHasErrors(['email']);
	}

	public function test_register_should_give_us_password_error_if_password_input_is_less_then_three(): void
	{
		$response = $this->post('/registration', [
			'username'              => 'name username',
			'email'                 => 'example@gmail.com',
			'password'              => 'te',
			'password_confirmation' => 'te',
		]);

		$response->assertSessionHasErrors(['password']);
	}

	public function test_register_should_give_us_password_confirmation_error_if_password_confirmation_input_does_not_much_password_input(): void
	{
		$response = $this->post('/registration', [
			'username'              => 'name username',
			'email'                 => 'example@gmail.com',
			'password'              => 'testing-password',
			'password_confirmation' => 'does-not-much-password-input',
		]);

		$response->assertSessionHasErrors(['password_confirmation']);
	}

	public function test_user_should_be_create_and_redirect_to_email_confirmation_page_when_register_form_was_submited_successfuly(): void
	{
		$username = 'name surname';
		$email = 'example@gmail.com';
		$password = 'testing-password';

		$response = $this->post('/registration', [
			'username'              => $username,
			'email'                 => $email,
			'password'              => $password,
			'password_confirmation' => $password,
		]);

		$response->assertRedirectToRoute('verification.email_sent');

		$user = User::where('email', $email)->first();

		$this->assertNotNull($user);
		$this->assertEquals($username, $user->username);
		$this->assertTrue(Hash::check($password, $user->password));
	}
}
