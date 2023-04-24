<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;

class EmailVerificationController extends Controller
{
	public function verify($id): RedirectResponse
	{
		event(new Verified(User::where('email_verification_token', $id)->firstOrFail()));

		return redirect()->route('verification.notice');
	}
}
