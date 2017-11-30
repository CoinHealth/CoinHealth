<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientStress extends Model
{
	protected $table = 'patient_stresses';

	protected $fillable = [
      'patient_id',
      'major_stressors',
      'other_stressors',
      'changes_in_family_health',
      'handle_stress',
      'relaxing_activities',
	];

  protected $casts = [
      'major_stressors' => 'array',
  ];

  public function patient()
 	{
 		return $this->belongsTo(\App\Models\Patient::class);
 	}
}
