<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Forum extends Model {

	protected $fillable = [
		'channel',
		'channel_route',
		'user_id',
		'title',
		'share',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function posts()
	{
		return $this->hasMany(Post::class)->orderBy('created_at', 'ASC');
	}

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

	public function subscribers()
	{
		return $this->belongsToMany(User::class)
								->withTimestamps();
	}

}
