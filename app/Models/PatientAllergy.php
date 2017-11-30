<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientAllergy extends Model
{
    protected $table = 'patient_allergies';
    protected $fillable = [
        'patient_id',
        'active',
        'allergy_type',
        'name',
        'reaction',
        'notes',
    ];

    protected $appends = [
        'type',
        'status',
    ];

    public function owner()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }

    public function getTypeAttribute()
    {
        switch ($this->allergy_type) {
            case 1:
                $type = 'Specific Drug';
                break;
            case 2:
                $type = 'Class of Drugs';
                break;
            default:
                $type = 'Other Allergy';
                break;
        }
        return $type;
    }

    public function getStatusAttribute()
    {
        switch ($this->active) {
            case 0:
                $status = 'Inactive';
                break;
            default:
                $status = 'Active';
                break;
        }
        return $status;
    }

}
