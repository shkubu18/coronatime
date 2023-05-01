<?php

namespace App\Http\Controllers;

use App\Http\Requests\Password\ResetLinkRequest;
use App\Http\Requests\Password\UpdatePasswordRequest;
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
	public function sendResetLink(ResetLinkRequest $request): RedirectResponse
	{
		$token = Str::random(64);

		DB::table('password_reset_tokens')->insert([
			'email'      => $request->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		Mail::to($request->email)->send(new ResetPassword($token));

		return redirect()->route('email.confirmation_sent');
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

		$user = User::where('email', $userEmail)->update(['password' => bcrypt($request->password)]);

		DB::table('password_reset_tokens')->where(['token' => $request->token])->delete();

		return redirect()->route('password.updated');
	}
}
