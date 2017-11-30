<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model {

	protected $table = 'taxes';

	protected $fillable = [
		'fpl_percentage',
		'tax_limit',
	];

	protected $primaryKey = 'fpl_percentage';
}
