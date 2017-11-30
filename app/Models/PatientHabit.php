<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientHabit extends Model
{
    protected $table = 'patient_habits';

    protected $fillable = [
    	'patient_id',
    	'health_status',
    	'exercise_frequency',
        'type_of_exercise',
    ];

    public function patient()
    {
    	return $this->belongsTo(\App\Models\Patient::class);
    }

}
