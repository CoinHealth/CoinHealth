<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model {

	protected $fillable = [
		// 'from_id',
		// 'to_id',
		'thread_id',
		'user_id',
		'message'
	];

	protected $appends = [
		'time',
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function thread()
	{
		return $this->belongsTo(\App\Models\Thread::class);
	}

	public function attachments()
	{
		return $this->belongsToMany(\App\Models\Attachment::class)
			->withPivot('user_id', 'permission')
			->withTimestamps();
	}

	public function getCssClassAttribute()
	{
		return $this->user_id == auth()->user()->id ? 'right-top' : 'left-top';
	}

	public function getPositionClassAttribute()
	{
		return $this->user_id == auth()->user()->id ? 'right' : 'left';
	}

	public function getTimeAttribute()
	{
		return $this->created_at->diffForHumans();
	}
}
