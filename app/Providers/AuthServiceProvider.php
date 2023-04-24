<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The model to policy mappings for the application.
	 *
	 * @var array<class-string, class-string>
	 */
	protected $policies = [
		// 'App\Models\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any authentication / authorization services.
	 */
	public function boot(): void
	{
		VerifyEmail::toMailUsing(function ($notifiable) {
			$verificationUrl = URL::temporarySignedRoute(
				'verification.verify',
				Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
				[
					'id'                            => $notifiable->email_verification_token,
					'hash'                          => sha1($notifiable->getEmailForVerification()),
				]
			);

			return (new MailMessage)
				->view('emails.verify-email', ['verificationUrl' => $verificationUrl])
				->subject('Verify your email address');
		});
	}
}
