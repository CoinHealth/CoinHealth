<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
	protected $connection = 'mysql_sales';
  	protected $table = 'plans';

    protected $fillable = [
    	'stripe_plan',
    	'name',
    	'interval',
    	'amount',
    	'currency',
    	'trial_period',
    	'description',
    ];
}

