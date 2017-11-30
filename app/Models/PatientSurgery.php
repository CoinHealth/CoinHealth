<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientSurgery extends Model
{
    protected $table = 'patient_surgeries';


    protected $fillable = [
    	'patient_id',
        'problem',
        'type',
    ];

    public function patient()
   	{
   		return $this->belongsTo(\App\Models\Patient::class);
   	}
   	
}
