<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryFilterRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'search'     => 'nullable|string',
			'sort_by'    => 'in:location,confirmed,recovered,deaths',
			'sort_order' => 'in:asc,desc',
		];
	}
}
