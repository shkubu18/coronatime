<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordLinkRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Mail\ResetPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ResetPasswordController extends Controller
{
	public function sendPasswordResetLink(ResetPasswordLinkRequest $request): RedirectResponse
	{
		$existingEmail = DB::table('password_reset_tokens')->where('email', $request->email)->first();

		if ($existingEmail)
		{
			return back()->withErrors(['email' => __('reset-password.reset_link_already_sended')]);
		}

		$token = Str::random(64);

		DB::table('password_reset_tokens')->insert([
			'email'      => $request->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		Mail::to($request->email)->send(new ResetPassword($token));

		return redirect()->route('verification.email_sent');
	}

	public function showResetPasswordForm(string $token): View
	{
		return view('reset-password.reset', ['token' => $token]);
	}

	public function updatePassword(UpdatePasswordRequest $request): RedirectResponse|Response
	{
		if (!DB::table('password_reset_tokens')->where(['token' => $request->token])->first())
		{
			return abort(403, 'Unauthorized action.');
		}

		$userEmail = DB::table('password_reset_tokens')->first()->email;

		$user = User::where('email', $userEmail)->firstOrFail()->update(['password' => $request->password]);

		DB::table('password_reset_tokens')->where(['token' => $request->token])->delete();

		return redirect()->route('password.updated');
	}
}
