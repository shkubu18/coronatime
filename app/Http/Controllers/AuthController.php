<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Mail\EmailVerification;
use App\Models\User;
use App\Services\AuthService;
use App\Services\VerificationUrlService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		if (!auth()->attempt([$request->login_type => $request->username_or_email, 'password' => $request->password], $request->remember))
		{
			throw ValidationException::withMessages([
				'auth_fail' => 'Email or password is incorrect',
			]);
		}

		AuthService::checkEmailVerification($request);

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

		$verificationUrl = VerificationUrlService::generate($user);

		try
		{
			Mail::to($user->email)->send(new EmailVerification($verificationUrl));
		}
		catch (\Exception $e)
		{
			$user->delete();
			return redirect()->back()->withErrors(['verify_email_send_fail' => __('sending-emails.email_confirmation_fail')]);
		}

		return redirect()->route('verification.email_sent');
	}
}
