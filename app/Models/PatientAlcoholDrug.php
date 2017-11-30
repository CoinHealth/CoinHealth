<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientAlcoholDrug extends Model
{
    protected $table = 'patient_alcohol_drugs';


    protected $fillable = [
    	'patient_id',
        'drinking',
        'number_of_glasses',
        'drinks_in_morning',
        'cut_down_drinking',
        'felt_guilty',
        'alcoholic',
        'use_drugs',
    ];

    public function patient()
    {
    	return $this->belongsTo(\App\Models\Patient::class);
    }

}
