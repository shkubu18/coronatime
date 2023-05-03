<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovidStatistic extends Model
{
	use HasFactory;

	protected $guarded = ['id'];

	/**
	 * Scope a query to search for a given term in the "en" and "ka" fields of the "country" JSON column.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string|null                           $search
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeSearch($query, $search)
	{
		return $search ? $query->where('country->en', 'like', '%' . ucwords($search) . '%')
			->orWhere('country->ka', 'like', '%' . $search . '%') : $query;
	}

	/**
	 * Scope a query to sort by a given column and order.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string                                $sortBy
	 * @param string                                $sortOrder
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeSort($query, $sortBy, $sortOrder)
	{
		return $query->orderBy(in_array($sortBy, ['confirmed', 'deaths', 'recovered']) ? $sortBy : 'id', $sortOrder);
	}
}
