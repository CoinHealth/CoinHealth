<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientVital extends Model
{
	protected $table = 'patient_vitals';
    protected $fillable = [
    	'patient_id',
    	'temperature',
    	'pulse',
    	'blood_pressure',
    	'respiratory_rate',
    	'oxygen_saturation',
    	'height',
    	'weight',
    	'bmi',
    	'pain',
        'smoking',
    	'alcohol',
    	'head_circumference',
    	'customs',
    ];

    protected $casts = [
    	'blood_pressure' => 'object',
    	'height' => 'object',
        'weight' => 'object',
    	'customs' => 'object',
    ];

    public function getBloodPressureFormattedAttribute()
    {
        $blood_pressure = $this->blood_pressure;
        return $blood_pressure->systolic .'/'. $blood_pressure->diastolic;
    }

    public function getHeightFormatted()
    {
        $height = $this->height;
        return $height->feet . "'". $height->inches ? $height->inches.'"' : '';
    }

    public function getPounds()
    {
        return $this->weight->pounds ? $this->weight->pounds : '';
    }
}
