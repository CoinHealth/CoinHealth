<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientProblem extends Model
{
    // This model is not used see PatientCondition
	protected $table = 'patient_problems';

    protected $fillable = [
    	'patient_id',
        'name',
    	'problem_id',
        'date_diagnosed',
        'status', 
        'notes',
    ];

    public function problem() {
    	return $this->hasOne(\App\Models\MedCondition::class, 'id', 'problem_id');
    }

}
