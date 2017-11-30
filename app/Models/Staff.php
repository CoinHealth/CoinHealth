<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';

    protected $fillable = [
        'subscriber_id', // User's ID
        // 'first_name',
        // 'last_name',
        // 'middle_name',
        // 'contact',
        // 'email',
        // 'address',
        'user_id',
    ];

    // protected $casts = [
    //     'address' => 'object',
    // ];
    protected $with = [
        'user',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
