<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Mail\EmailVerification;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		if (!auth()->attempt([$request->login_type => $request->username_or_email, 'password' => $request->password], $request->remember))
		{
			throw ValidationException::withMessages([
				'auth_fail' => 'Email or password is incorrect.',
			]);
		}
		elseif (!User::where($request->login_type, $request->username_or_email)->first()->hasVerifiedEmail())
		{
			auth()->logout();
			throw ValidationException::withMessages([
				'email_verify' => 'Your email is not verified. Please verify your email before logging in',
			]);
		}

		session()->regenerate();

		return redirect()->route('worldwide_statistics.show');
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();

		return redirect()->route('login.page');
	}

	public function register(RegistrationRequest $request): RedirectResponse
	{
		$user = User::create($request->validated());

		$verificationUrl = URL::temporarySignedRoute(
			'verification.verify',
			Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
			[
				'token'                            => $user->email_verification_token,
				'hash'                             => sha1($user->getEmailForVerification()),
			]
		);

		Mail::to($user->email)->send(new EmailVerification($verificationUrl));

		return redirect()->route('verification.email_sent');
	}
}
