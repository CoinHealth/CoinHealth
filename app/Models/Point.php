<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model {

	protected $fillable = [
		'from_url',
		'user_id',
		'gamification_id',
		'point',
	];

	protected $dates = [
		'created_at',
	];


	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	

	public function scopeProviders()
	{
		// return $this->user->
	}

}
