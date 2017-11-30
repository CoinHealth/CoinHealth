<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subsidy;

class Location extends Model {

	protected $fillable = [
		'state_abbr',
		'zip_code',
		'city',
		'county',
		'pretty_name',
		'rating_area',
		'coast',
	];

	public function subsidy()
	{
		return $this->hasOne(Subsidy::class, 'state_abbr', 'state_abbr');
	}

	public function scopeState($qry)
	{
		return $qry->groupBy('state_abbr');
	}

	// public function


}
