<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientCondition extends Model
{
    protected $table = 'patient_conditions';

    protected $fillable = [
    	'patient_id',
        'problem_id',
    	'name',
    	'date_diagnosed',
    	'status', //[active, inactive, resolved];
    	'internal_notes',
    ];

    public function problem() {
        return $this->hasOne(\App\Models\MedCondition::class, 'uid', 'problem_id');
    }

    public function patient()
    {
    	return $this->belongTo(\App\Models\Patient::class);
    }
}
