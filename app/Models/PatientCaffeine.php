<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientCaffeine extends Model
{
    protected $table = 'patient_caffeines';

    protected $fillable = [
    	'patient_id',
    	'drinking',
    	'number_of_glasses',
    ];

    public function patient()
    {
    	return $this->belongsTo(\App\Models\Patient::class);
    }
}
