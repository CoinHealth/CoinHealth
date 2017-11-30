<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model {

	protected $fillable = [
		'user_id',
		'description',
		'data_id',
	];

	protected $appends = [
		'time',
		'upvote_count',
		'downvote_count'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function replies()
	{
		return $this->hasMany(\App\Models\ReplyTimeline::class);
	}

	public function attachments()
	{
		return $this->hasMany(\App\Models\Attachment::class, 'data_id', 'id');
	}

	public function getTimeAttribute()
	{
		return $this->updated_at->gt($this->created_at) ? 'updated '. $this->updated_at->diffForHumans() : 'posted '. $this->created_at->diffForHumans();
	}

	public function votes()
	{
		return $this->belongsToMany(\App\Models\User::class, 'timeline_user')
					->withPivot('is_upvoted');
	}

	public function upvotes()
	{
		return $this->votes()
					->where('is_upvoted', true);
	}

	public function downvotes()
	{
		return $this->votes()
					->where('is_upvoted', false);
	}

	public function postVote($user, $vote)
	{
		$this->votes()->attach($user->id, [
			'is_upvoted' => $vote,
		]);
	}

	public function updateVote($user, $vote)
	{
		$this->votes()->updateExistingPivot($user->id, [
			'is_upvoted' => $vote
		]);
	}

	public function getDownvoteCountAttribute()
	{
		return $this->downvotes()->count();
	}

	public function getUpvoteCountAttribute()
	{
		return $this->upvotes()->count();
	}
}
