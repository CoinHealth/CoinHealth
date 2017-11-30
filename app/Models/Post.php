<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $fillable = [
		'forum_id',
		'message_id',
		'channel',
		'user_id',
		'message',
		'message_type',
	];

	public function forum()
	{
		return $this->belongsTo(\App\Models\Forum::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function replies()
	{
		return $this->hasMany(\App\Models\Post::class, 'message_id', 'id')
								->where('message_type', 2);
	}

	// public function replies()
	// {
	// 	return $this->_replies()->where('message_type', 2);
	// }

	public function scopeGeneralTopics($qry)
	{
		return $qry->where('channel', 1);
	}

	public function scopeHealthTopics($qry)
	{
		return $qry->where('channel', 2);
	}

	public function scopeNewsTopics($qry)
	{
		return $qry->where('channel', 3);
	}

	public function scopeSupportTopics($qry)
	{
		return $qry->where('channel', 4);
	}

	public function scopeComments($qry)
	{
		return $qry->where('message_type', 1);
	}

	public function scopeReplies($qry)
	{
		return $qry->where('message_id', $this->id)
							 ->where('message_type', 2);
	}
}
