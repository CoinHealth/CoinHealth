<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'subscriber_id', // User's ID
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'address',
        'contact',
        'business',
    ];

    protected $casts = [
        'address' => 'object',
        'business' => 'object',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
