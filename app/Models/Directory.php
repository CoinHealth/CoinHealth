<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    protected $table = 'directories';
    
    protected $fillable = [
    	'user_id', 
    	'saveable_id',
    	'saveable_type',
    ];

    // public function provider()
    // {
    //     return $this->morphToMany(\App\Models\Provider::class, 'saveable');
    // }

    public function saveable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }


}
