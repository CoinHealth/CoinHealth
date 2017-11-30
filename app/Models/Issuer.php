<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issuer extends Model {

	protected $connection = 'mysql_crm';

	protected $fillable = [
		'issuer_id',
		'state_abbr',
		'issuer_name',
		'url_submitted',
		'tech_poc_email',
	];

}
