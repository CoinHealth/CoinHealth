<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credentials extends Model {

	protected $fillable = [
		'user_id',
		'license_number',
		'company',
	];

}
