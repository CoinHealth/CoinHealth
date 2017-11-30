<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
	protected $connection = 'mysql_sales';
    protected $table = 'inquiries';

    protected $fillable = [
    	'uuid',
    	'user_id',
    	'name',
    	'email',
    	'phone',
    	'subject',
    	'message',
    	'response_needed',
    	'status',
    ];
}
