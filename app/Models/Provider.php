<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use App\Traits\TraitGetTableName;
class Provider extends Model
{
    use AlgoliaEloquentTrait, TraitGetTableName;

    protected $primaryKey = 'provider_id';
    public $incrementing = false;

    public static $objectIdKey = 'id';
    public static $autoIndex = true;

    protected $fillable = [
        'provider_id',
        'prefix',
        'name',
        'physician_first_name',
        'physician_last_name',
        'open_appointments',
        'specialties',
        'categories',
        'sub_categories',
        'phone',
        'address',
        'appointment_reasons',
        'type',
        'degree',
    ];

    protected $casts = [
        'specialties' => 'array',
        'categories' => 'array',
        'sub_categories' => 'array',
        'address' => 'object',
        'appointment_reasons' => 'array',
    ];

    public $algoliaSettings = [
        // 'synonyms' => [
        //     [
        //         'objectID' => 'id',
        //         'type'     => 'synonym',
        //     ],
        // ],
        'searchableAttributes' => [
            'name',
            'physician_first_name',
            'physician_last_name',
            'specialties',
            'categories',
            'sub_categories',
            'phone',
            'address',
            'type',
            'degree',
        ],
    ];

    protected $appends = [
        // 'user',
        'is_premium',
        'is_ehr_subscribed',
        'avatar_path',
        'full_title',
        'full_address',
    ];

    protected $with = [
        'user',
    ];

    public static function setObjectIdKey($id)
    {
        self::$objectIdKey = $id;
    }

    public function getObjectIdKey()
    {
        return self::$objectIdKey;
    }

    // nag claim
    public function user()
    {
        $this->primaryKey = 'provider_id';
        $rel =  $this->belongsToMany(\App\Models\User::class, 'provider_user');
        $this->primaryKey = 'id';
        return $rel;
    }

    public function hasUser()
    {
        return (boolean) $this->user()->count();
    }

    public function getIsEhrSubscribedAttribute()
    {
        if ($this->hasUser()) {
            return $this->user()->first()->subscribed('ehr');
        }
        return false;
    }

    public function getIsPremiumAttribute()
    {
        if ($this->hasUser()) {
            return $this->user()->first()->subscribed('premium-listing') || $this->user()->first()->subscribed('ehr');
        }
        return false;
    }


    // leads from EHR view.
    public function leads()
    {
        $res = $this->morphMany(\App\Models\Directory::class, 'saveable', 'saveable_type', 'saveable_id', 'provider_id');
        return $res;
    }

    // appointment leads
    public function ehr_leads()
    {
        $this->primaryKey = 'id';
        $res = $this->hasMany(\App\Models\EhrLead::class, 'provider_id');
        $this->primaryKey = 'provider_id';
        return $res;
    }

    public function getAvatarPathAttribute()
    {
        return ($this->hasUser() && $this->is_ehr_subscribed) ? $this->user()->first()->avatar_path : '/assets/icons/doctor-placeholder.jpg';
    }

    // cath
    // public function getFullAddressAttribute()
    // {
    //   if ($this->address) {
    //     $address = $this->address;
    //     return $address->street . ', ' . $address->city . ', ' . $address->state . ', ' . $address->zip;
    //   }

    // }


    public function getAlgoliaRecord()
    {
        return $this->toArray();
    }



    public function getFullTitleAttribute()
    {
        $prefix = $this->prefix;
        $name = $this->name;
        $degree = $this->degree;
        return $prefix .' '. $name .', '. $degree;
    }

    public function getFullAddressAttribute()
    {
      if ($this->address != null) {
        $address = $this->address;
        $street = isset($address->street_1) ? $address->street_1 . ', ' : '';
        $city = isset($address->city) ? $address->city . ', ' : ' ';
        $state = isset($address->state) ? $address->state . ', ' : ' ';
        $zip = isset($address->zip) ? $address->zip : ' ';
        return  $street . $city . $state . $zip;
      }

    }


}
