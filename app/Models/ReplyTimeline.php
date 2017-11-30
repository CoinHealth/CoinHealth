<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplyTimeline extends Model {

  protected $table = 'rtimelines';

  protected $fillable = [
    'timeline_id',
    'user_id',
    'message',
  ];

  protected $appends = [
    'time',
  ];

  public function user()
  {
    return $this->belongsTo(\App\Models\User::class);
  }

  public function timeline()
  {
    return $this->belongsTo(\App\Models\Timeline::class);
  }

  public function getTimeAttribute()
	{
		return $this->updated_at->gt($this->created_at) ? 'updated '. $this->updated_at->diffForHumans() : 'posted '. $this->created_at->diffForHumans();
	}

}
