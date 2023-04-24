<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class RegistrationRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'username'                      => ['required', 'string', 'min:3', 'unique:users'],
			'email'                         => ['required', 'email', 'unique:users'],
			'email_verification_token'      => ['required', 'string'],
			'password'                      => ['required', 'min:3'],
			'password_confirmation'         => ['required_with:password', 'same:password'],
		];
	}

	protected function prepareForValidation()
	{
		$this->merge([
			'email_verification_token' => Str::uuid()->toString(),
		]);
	}
}
