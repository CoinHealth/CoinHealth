<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model {

   protected $fillable = [
    	'user_id',
    	'license_number',
    	'job_title',
    	'affiliation',
    ];

    protected $appends = [
        'is_premium',
        'is_subscribed',
    ];

    public function user()
    {
    	return $this->belongsTo(\App\Models\User::class);
    }

    public function getIsPremiumAttribute()
    {
        return $this->user->subscribed('premium-listing') || $this->user->subscribed('crm');
    }

    public function getIsSubscribedAttribute()
    {
        return $this->user->subscribed('crm');
    }

    public function directories()
    {
        return $this->morphMany(\App\Models\Directory::class, 'saveable');
    }

}
