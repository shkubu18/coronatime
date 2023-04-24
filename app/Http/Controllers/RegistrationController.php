<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

class RegistrationController extends Controller
{
	public function createUser(RegistrationRequest $request): RedirectResponse
	{
		event(new Registered(User::create($request->validated())));

		return redirect()->route('email.confirmation_sent');
	}
}
