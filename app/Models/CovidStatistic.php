<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovidStatistic extends Model
{
	use HasFactory;

	protected $guarded = ['id'];

	public function scopeSearch($query, $search)
	{
		$search ? $query->where('country->en', 'like', '%' . ucwords($search) . '%')
			->orWhere('country->ka', 'like', '%' . $search . '%') : $query;
	}

	public function scopeSort($query, $sortBy, $sortOrder)
	{
		return $query->orderBy(in_array($sortBy, ['confirmed', 'deaths', 'recovered']) ? $sortBy : 'id', $sortOrder);
	}
}
