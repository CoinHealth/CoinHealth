<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Models\User;

class Level extends Model {

	protected $fillable = [
		'user_id',
		'lists',
		'level'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function getLevelsAttribute()
	{
		$levels = $this->tasks();
		return $levels;
		$current = explode(',', $this->levels);
		return $current;
	}

	private function tasks()
	{
		$levels = Category::levels()->get()->lists('value');
		return $levels;
	}
}
