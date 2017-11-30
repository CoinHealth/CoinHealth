<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = 'user_logs';
    public $timestamps = false;

   	protected $fillable = [
    	'user_id',
    	'last_logged_on',
        'type',
        'count',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
