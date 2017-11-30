<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientInjury extends Model
{
    protected $table = 'patient_injuries';

    protected $fillable = [
    	'patient_id',
		'operation',
        'hospitalizations',
        'psychological_therapy',
        'major_injuries',
        'illnesses',
        'date',
    ];

    protected $dates = [
        'date',
    ];

    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }
}
