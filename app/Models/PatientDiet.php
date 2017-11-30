<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientDiet extends Model
{
    protected $table = 'patient_diets';

    protected $fillable = [
    	'patient_id',
        'meals',
        'special_diet', 
        'dairy_products',
        'lactose_intolerant',
        'fruits',
        'soy',
        'fish',
    ];

    public function patient()
    {
    	return $this->belongsTo(\App\Models\Patient::class);
    }

}
