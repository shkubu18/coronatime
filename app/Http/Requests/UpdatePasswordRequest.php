<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'password'                      => ['required', 'min:3'],
			'password_confirmation'         => ['required_with:password', 'same:password'],
		];
	}
}
