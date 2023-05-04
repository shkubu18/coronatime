<?php

namespace App\Http\Requests\Password;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordLinkRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'email' => 'required|exists:users,email',
		];
	}
}
