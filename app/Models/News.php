<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

	protected $fillable = [
    'user_id',
    'title',
    'body',
  ];

  public function user()
  {
    return $this->belongsTo(\App\Models\User::class);
  }

	public function vote()
	{
		return $this->belongsToMany(\App\Models\User::class)
								->withTimestamps()
								->withPivot('votes');
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

	public function getBodyDeltaAttribute()
	{

		$parser = new \DBlackborough\Quill\Parser\Html();
		$parser->load($this->body);
		$parser->parse();

		$renderer = new \DBlackborough\Quill\Renderer\Html($parser->content());
		return $renderer->render();

	}

	public function getAvatarAttribute()
	{
		return $this->user ? $this->user->avatar_path : '/assets/icons/pf-sm2.png';
	}

	public function getNameAttribute()
	{
		if (!$this->user) 
			return 'CareParrot';
		
		return $this->user->full_name;
	}

	public function getTotalVotesAttribute()
	{
		return $this->vote()->sum('votes');
	}

	public function getHashedIdAttribute()
	{
		$hash = new \Hashids\Hashids(env('HASH_SALT', 'c@r3p@rR0t'), 10);
		return $hash->encode($this->id);
	}
}
