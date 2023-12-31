<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;

class EmailVerificationController extends Controller
{
	public function verify(string $token): RedirectResponse
	{
		event(new Verified(User::where('email_verification_token', $token)->firstOrFail()));

		return redirect()->route('verification.notice');
	}
}
