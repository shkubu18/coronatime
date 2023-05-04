<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'username_or_email'        => 'required|min:3',
			'login_type'               => 'required',
			'password'                 => 'required',
		];
	}

	protected function prepareForValidation()
	{
		$loginType = filter_var($this->login, FILTER_VALIDATE_EMAIL)
			? 'email'
			: 'username';

		$this->merge([
			'login_type' => $loginType,
		]);
	}
}
