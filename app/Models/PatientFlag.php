<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class PatientFlag extends Model
{
    protected $table = 'patient_flags';

    protected $fillable = [
        'patient_id',
        'flag_type',
        'notes',
    ];

    public function owner()
    {
        return $this->belongsTo(Patient::class);
    }
}
