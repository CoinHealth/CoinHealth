<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Blog extends Model {

	protected $fillable = [
    'title',
    'user_id',
    'content',
  ];

	public function user()
	{
		return $this->belongsTo('App\User');
	}


	public function vote()
	{
		return $this->belongsToMany(User::class)
								->withTimestamps()
								->withPivot('votes');
	}

	public function getHashedIdAttribute()
	{
		$hash = new \Hashids\Hashids(env('HASH_SALT', 'c@r3p@rR0t'), 10);
		return $hash->encode($this->id);
	}

	public function hasVoted($val)
	{
		if (auth()->check()) {
			$vote = $this->vote()
				 ->where('user_id', auth()->user()->id )
				 ->where('votes', $val)->first();
			if ($vote)
				return $vote->id === auth()->user()->id;
			return false;
		}
		return false;
	}

	public function getTotalVotesAttribute()
	{
		return $this->vote()->sum('votes');
	}
}
