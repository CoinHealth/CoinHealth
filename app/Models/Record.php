<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
    	'description',
    	'user_id', // who saved the data
    	'subscriber_id', // owner of the subscription
    	/*
			recordable morph: model of the record
    	*/ 
    	'recordable_id',
    	'recordable_type',
    	/*
			trackable morph: model where the record is for
    	*/ 
		'taggable_id',
		'taggable_type',
    ];

    public function recordable()
    {
        return $this->morphTo();
    }

    public function taggable()
    {
        return $this->morphTo();
    }

}
