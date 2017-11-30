<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Age extends Model {

	protected $fillable = [
		'age',
		'value'
	];

	protected $primaryKey = 'age';

}
