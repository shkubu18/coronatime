<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CovidStatistic extends Model
{
	use HasFactory;

	protected $guarded = ['id'];

	public static function scopeSearch(Builder $query, ?string $search): void
	{
		$search ? $query->where('country->en', 'like', '%' . ucwords($search) . '%')
			->orWhere('country->ka', 'like', '%' . $search . '%') : $query;
	}

	public static function scopeSort(Builder $query, string $sortBy, string $sortOrder): void
	{
		$query->orderBy(in_array($sortBy, ['confirmed', 'deaths', 'recovered']) ? $sortBy : 'id', $sortOrder);
	}
}
