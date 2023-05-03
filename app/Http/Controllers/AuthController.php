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
		if (!auth()->attempt([$request->login_type => $request->login, 'password' => $request->password], $request->remember))
		{
			throw ValidationException::withMessages([
				'auth_fail' => 'Email or password is incorrect.',
			]);
		}

		if (!User::where($request->login_type, $request->login)->first()->hasVerifiedEmail())
		{
			auth()->logout();
			throw ValidationException::withMessages([
				'email_verify' => 'Your email is not verified. Please verify your email before logging in',
			]);
		}

		session()->regenerate();

		return redirect()->route('statistics.worldwide');
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();

		return redirect()->route('login.page');
	}
}
