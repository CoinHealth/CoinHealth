<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Activity extends Model {

	protected $fillable = [
		'user_id',
		'from_url',
		'message',
		'data_id',
		'model'
	];

	protected $appends = [
		'notification',
	];

	public function data()
	{
		return $this->hasOne($this->model, 'id', 'data_id');
	}

	public function owner()
	{
		return $htis->belongsTo(\App\Models\User::class, 'id', 'user_id');
	}

	public function getNotificationAttribute()
	{
		return $this->message;
	}

}
