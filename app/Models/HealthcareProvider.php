<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class HealthcareProvider extends Model {
	protected $table = 'healthcare_providers';
	protected $fillable = [
		'name',
    'specialization',
    'street',
    'city',
    'state',
    'zip_code',
    'county',
    'contact_no',
    'affiliations',
    'title',
    'status',
	];

	protected $appends = [
		'total_rating'
	];

	public function scopeByRating($query)
	{
		return $query->orderBy('rating', 'DESC');
	}

	public function rating()
	{
		return $this->belongsToMany(User::class, 'healthcare_provider_user')
								->withPivot('ratings')
								->withTimestamps();
	}

	public function getTotalRatingAttribute()
	{
		return floor($this->rating()->avg('ratings'));
	}

	public function scopeTitle($qry)
	{
		return $qry->groupBy('title');
	}

	public function scopeConfirmed($qry)
	{
		return $qry->where('is_confirmed', 1);
	}

}
