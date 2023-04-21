<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;

class RedirectVerifiedUser
{
	/**
	 * Handle the event.
	 */
	public function handle(Verified $event): RedirectResponse
	{
		if ($event->user instanceof MustVerifyEmail && !$event->user->hasVerifiedEmail())
		{
			$event->user->markEmailAsVerified();
		}
		return redirect()->route('verification.notice');
	}
}
