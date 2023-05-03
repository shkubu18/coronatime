<?php

namespace Tests\Feature;

use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
	use RefreshDatabase;

	public function test_the_forgot_password_page_is_accessible(): void
	{
		$response = $this->get('/password/forgot');
		$response->assertSuccessful();
		$response->assertSee(__('reset-password.reset_password'));
		$response->assertViewIs('reset-password.forgot-password');
	}

	public function test_reset_password_should_give_us_email_error_if_email_input_is_not_provided(): void
	{
		$response = $this->post('/password/forgot');

		$response->assertSessionHasErrors(['email']);
	}

	public function test_reset_password_should_give_us_email_error_if_user_does_not_exists_with_similar_email(): void
	{
		$response = $this->post('/password/forgot', ['email' => 'doesnotexists@gmail.com']);

		$response->assertSessionHasErrors(['email']);
	}

	public function test_reset_password_should_give_us_email_error_if_user_does_not_exists_with_similar_emal(): void
	{
		$user = User::factory()->create();

		$response = $this->post('/password/forgot', ['email' => $user->email]);

		$response->assertRedirectToRoute('email.confirmation_sent');
	}

	public function test_reset_password_should_give_us_password_error_if_password_input_is_not_provided(): void
	{
		$response = $this->post('/password/reset');

		$response->assertSessionHasErrors(['password']);
	}

	public function test_reset_password_should_give_us_password_confirmation_error_if_password_confirmation_input_is_not_provided_when_password_input_is_exists(): void
	{
		$response = $this->post('/password/reset', ['password' => 'testing-password']);

		$response->assertSessionHasErrors(['password_confirmation']);
	}

	public function test_reset_password_should_give_us_password_error_if_password_input_is_less_than_three(): void
	{
		$response = $this->post('/password/reset', [
			'password'              => 'te',
			'password_confirmation' => 'te',
		]);

		$response->assertSessionHasErrors(['password']);
	}

	public function test_reset_password_should_give_us_password_confirmation_error_if_password_confirmation_input_does_not_much_password_input(): void
	{
		$response = $this->post('/password/reset', [
			'password'              => 'testing-password',
			'password_confirmation' => 'does-not-much',
		]);

		$response->assertSessionHasErrors(['password_confirmation']);
	}

	public function test_reset_password_should_send_email_confirmation_link_to_the_user_if_user_typed_correct_email_in_email_input_end_redirect_confirmation_page(): void
	{
		Mail::fake();

		$user = User::factory()->create();

		$response = $this->post('/password/forgot', ['email' => $user->email]);

		Mail::assertSent(ResetPassword::class, function ($mail) use ($user) {
			$mail->build();

			return $mail->hasTo($user->email) &&
				   $mail->subject === 'Reset Password' &&
				   $mail->view === 'emails.password-reset' &&
				   $mail->token === DB::table('password_reset_tokens')->first()->token;
		});

		$response->assertRedirectToRoute('email.confirmation_sent');
	}

	public function test_user_shoud_be_redirected_to_reset_password_page_when_user_click_password_reset_buttton_from_received_email(): void
	{
		$user = User::factory()->create();
		$token = Str::random(64);

		DB::table('password_reset_tokens')->insert([
			'email'      => $user->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		$response = $this->get('/password/reset/' . $token);
		$response->assertSuccessful();
	}

	public function test_user_password_should_update_when_form_was_submited_successfuly_end_then_user_should_redirect_password_updated_page(): void
	{
		$user = User::factory()->create();
		$token = Str::random(64);

		DB::table('password_reset_tokens')->insert([
			'email'      => $user->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		$response = $this->get('/password/reset/' . $token);
		$response->assertSuccessful();

		$response = $this->post('/password/reset', [
			'token'                 => $token,
			'password'              => 'new-password',
			'password_confirmation' => 'new-password',
		]);

		$this->assertTrue(Hash::check('new-password', $user->fresh()->password));

		$this->assertDatabaseMissing('password_reset_tokens', [
			'email' => $user->email,
			'token' => $token,
		]);

		$response->assertRedirectToRoute('password.updated');
	}

	public function test_if_token_does_not_exists_when_user_try_to_update_password_it_should_return_403_error(): void
	{
		$response = $this->post('/password/reset', [
			'password'              => 'new-password',
			'password_confirmation' => 'new-password',
		]);

		$response->assertStatus(403);
	}
}
