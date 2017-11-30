<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	protected $fillable = [
		'code',
		'title',
		'description',
		'from',
		'to',
	];

	protected $dates = [
		'from',
		'to'
	];

	public function getIsOpenEnrollmentAttribute()
	{
		$now = \Carbon\Carbon::now();
		// $now = \Carbon\Carbon::create(2016,1,1);
		return $now->between($this->from, $this->to);
	}

}
