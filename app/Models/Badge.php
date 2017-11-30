<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model {

	protected $fillable = [
		'name',
		'description',
		'badge_code',
		'levels',
		'icon',
	];


	public function getConvertedLevelsAttribute()
	{
		return json_decode($this->levels);
	}

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class)
								->withPivot('level', 'progress')
								->withTimestamps();
	}

	/**
	 * function authedUser()
	 * description: use this if a user is authenticated.
	 */
	public function authedUser()
	{
		return $this->users()->where('user_id', auth()->user()->id)->first();
	}

	/**
	 * function point_message()
	 * description: use this if a user is authenticated.
	 */
	public function getPointMessageAttribute()
	{
		// 11290:10 @cath kung lalagyan mo to ng translation dito mo yun gatin..
		return $this->name . ' Badge and earned ' . $this->authedUser()->pivot->progress;
	}


}
