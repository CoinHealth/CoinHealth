<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Health extends Model {

	protected $table = 'health';

	protected $fillable = [
		'question_header',
		'description',
		'title',
		'activity_question',
		'benefit_ids',
		'type',
		'points',
	];

	public function user()
	{
		return $this->belongsToMany(\App\Models\User::class)
			->withPivot('active')
			->withTimestamps();
	}
}
