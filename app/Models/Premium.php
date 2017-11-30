<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Premium extends Model {

	protected $connection = 'mysql_crm';

	protected $table = 'premium_listings';

	protected $fillable = [
		'data_model',
		'data_id',
		'purpose',
		'email',
		'website',
		'subscription',
		'payment_info',
	];


}
