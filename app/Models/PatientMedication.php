<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Medication;

class PatientMedication extends Model
{
    protected $table = 'patient_medications';
    protected $fillable = [
        'medication_id',
        'medication_name',
        'sig',
        'dispense',
        'refills',
        'daw',
        'pharmacy_note',
        'indication',
        'start_date',
        'end_date',
        'prn',
        'active',
        'internal_notes',
    ];

    protected $casts = [
        'daw' => 'boolean',
        'prn' => 'boolean',
        'active' => 'boolean',
    ];
    
    /**
     * @cath.
     */
    // protected $dates = [
    //     'start_date',
    //     'end_date',
    // ];

    public function medication()
    {
        return  ($this->medication_id) ? $this->hasOne(Medication::class) : null;
    }

    public function getStatusAttribute()
    {
        return $this->active ? 'Active' : 'Inactive';
    }

    public function getDawStatusAttribute()
    {
        return $this->daw ? 'Yes' : 'No';
    }

    public function getPrnStatusAttribute()
    {
        return $this->daw ? 'Yes' : 'No';
    }
}
