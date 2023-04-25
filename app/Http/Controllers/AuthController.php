<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		$loginType = $request->login_type;

		$remember = $request->remember;

		if (!auth()->attempt([$loginType => $request->login, 'password' => $request->password], $remember))
		{
			throw ValidationException::withMessages([
				'auth_fail' => 'The provided credentials do not match our records',
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
