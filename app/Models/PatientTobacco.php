<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientTobacco extends Model
{
    protected $table = 'patient_tobaccos';

    protected $fillable = [
    	'patient_id',
        'smoker',
        'currently_smoking',
        'sticks_per_day',
        'smoking_age',
        'quit_smoking_age',
        'about_quitting',
        'other_tobacco',
        'other_tobacco_type',
    ];

    protected $casts = [
        'other_tobacco' => 'array',
    ];

    public function patient()
    {
    	return $this->belongsTo(\App\Models\Patient::class);
    }

}
