<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $table = 'insurance';

    protected $fillable = [
        'patient_id',
        'insurance_company',
        'insurance_id',
        'group_number',
        'plan_name',
    ];

    public function attachments()
    {
        return $this->morphMany(\App\Models\Attachment::class, 'attachable', 'data_model', 'data_id');
    }
}
