<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'username'             => ['required', 'string', 'min:3', 'unique:users'],
			'email'                => ['required', 'email', 'unique:users'],
			'password'             => ['required', 'min:3'],
			'repeated_password'    => ['required_with:password', 'min:3', 'same:password'],
		];
	}
}
