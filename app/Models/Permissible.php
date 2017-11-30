<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissible extends Model
{
    protected $table = 'permissibles';

    protected $fillable = [
        'permission_id',
        'permissible_id',
        'permissible_type',
        'expired_at',
        'is_accepted',
        'is_revoked',
    ];

    public function permissible()
	{
        $model = $this->permissible_type;
        $id = $this->permissible_id;
        $this->setKeyName('permissible_id');
		$permissibles = $this->hasMany($model, 'patient_id');
        $this->setKeyName('id');
        return $permissibles;
	}

    public function scopeInformation($qry)
    {
        return $qry->whereIn('permissible_type', [
                'App\\Models\\PatientAbuse',
                'App\\Models\\PatientAlcoholDrug',
                'App\\Models\\PatientCaffeine',
                'App\\Models\\PatientCondition',
                'App\\Models\\PatientDiet',
                'App\\Models\\PatientHabit',
                'App\\Models\\PatientStress',
                'App\\Models\\PatientSurgery',
                'App\\Models\\PatientTobacco',
                'App\\Models\\PatientVital',
                'App\\Models\\PatientInjury',
            ]);
    }

    public function scopeProblems($qry)
    {
        return $qry->where('permissible_type', 'App\\Models\\PatientProblem');
    }

    public function scopeMedications($qry)
    {
        return $qry->where('permissible_type', 'App\\Models\\PatientMedication');
    }

    public function scopeAllergies($qry)
    {
        return $qry->where('permissible_type', 'App\\Models\\PatientAllergy');
    }

    public function scopeLaboratory($qry)
    {
        return $qry->where('permissible_type', 'App\\Models\\PatientLaboratory');
    }
}