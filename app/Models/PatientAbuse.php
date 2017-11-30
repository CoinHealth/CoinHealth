<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientAbuse extends Model
{
    protected $table = 'patient_abuses';

    protected $fillable = [
    	'patient_id',
        'physically_abused',
        'sexually_abused',
        'verbally_abused',
        'had_abuse_counseling',
    ];

    public function patient()
    {
    	return $this->belongsTo(\App\Models\Patient::class);
    }
}
