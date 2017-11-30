<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model {

	protected $fillable = [
		// 'from_id',
		// 'to_id',
		'user_id',
		'pair_id',
		'subject',
	];

	protected $appends = [
		'time',
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function collaborators()
	{
		return $this->belongsToMany(\App\Models\User::class, 'thread_user')
								->withTimestamps();
	}

	public function otherCollaborators()
	{
		return $this->collaborators()
							// ->where('user_id', '!=', auth()->user()->id)
							->orderBy('user_id', 'DESC');
	}

	public function replies()
	{
		return $this->hasMany(\App\Models\Reply::class, 'thread_id', 'pair_id')
				->orderBy('created_at', 'ASC');
	}

	public function getHashedIdAttribute()
	{
		$hash = new \Hashids\Hashids(env('HASH_SALT', 'c@r3p@rR0t'), 10);
		return $hash->encode($this->pair_id);
	}

	public function getTimeAttribute()
	{
		return $this->created_at->diffForHumans();
	}

}
