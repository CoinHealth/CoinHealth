<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientErx extends Model
{
    protected $table = 'patient_erx';

    protected $fillable = [
    	'patient_id',
    	'name',
    	'medication_id',
    	'physician_id',
    	'pharmacy_id',
    ];

    public function owner()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }
}
