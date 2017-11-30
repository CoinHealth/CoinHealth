<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permissible;

class PatientPermission extends Model
{
    protected $table = 'patient_permissions';

    protected $fillable = [
        'patient_id',
        'provider_id',
    ];

    public function permissibles()
    {
        return $this->hasMany(Permissible::class, 'permission_id');
    }

    public function userPatient()
    {
    	return $this->hasOne(\App\Models\User::class, 'id', 'patient_id')
            ->select('id', 'first_name', 'last_name');
    }

    public function userProvider()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'provider_id')
            ->select('id', 'first_name', 'last_name');
    }
}