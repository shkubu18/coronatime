<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		$loginType = $request->login_type;

		$remember = $request->remember;

		$user = User::where($loginType, $request->login)->first();

		if (!$user->hasVerifiedEmail())
		{
			return throw ValidationException::withMessages([
				'email_verify' => 'Your email is not verified. Please verify your email before logging in',
			]);
		}

		if (!auth()->attempt([$loginType => $request->login, 'password' => $request->password], $remember))
		{
			throw ValidationException::withMessages([
				'auth_fail' => 'Email or password is incorrect.',
			]);
		}

		session()->regenerate();

		return redirect()->route('dashboard.worldwide');
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();

		return redirect()->route('login.page');
	}
}
