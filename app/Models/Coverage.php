<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coverage extends Model
{
    protected $table = 'patient_coverage';

    protected $fillable = [
        'has_coverage',
        'patient_id',
        'insurance_provider_name',
        'insurance_provider_id',
        'signature_path',
        'insurance_card_path',
        'insurance',
        'secondary_insurance',
        'careparrot',
    ];

    protected $casts = [
        'insurance' => 'object',
        'secondary_insurance' => 'object',
        'careparrot' => 'object',
    ];

    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }

    public function signature()
    {
        return $this->morphOne(
                    \App\Models\Attachment::class,
                    'attachable',
                    'data_model',
                    'data_id')
                    ->where('file_type', 7);
    }
    
    public function primaryInsuranceCardFront()
    {
        return $this->morphOne(
                    \App\Models\Attachment::class,
                    'attachable',
                    'data_model',
                    'data_id')
                    ->where('file_type', 5);
    }

    public function primaryInsuranceCardBack()
    {
        return $this->morphOne(
                    \App\Models\Attachment::class,
                    'attachable',
                    'data_model',
                    'data_id')
                    ->where('file_type', 6);
    }

    public function secondaryInsuranceCardFront()
    {
        return $this->morphOne(
                    \App\Models\Attachment::class,
                    'attachable',
                    'data_model',
                    'data_id')
                    ->where('file_type', 9);
    }

    public function secondaryInsuranceCardBack()
    {
        return $this->morphOne(
                    \App\Models\Attachment::class,
                    'attachable',
                    'data_model',
                    'data_id')
                    ->where('file_type', 10);
    }

    public function careparrotId()
    {
        return $this->morphOne(
                    \App\Models\Attachment::class,
                    'attachable',
                    'data_model',
                    'data_id')
                    ->where('file_type', 8);
    }

    public function attachments()
    {
        return $this->morphMany(
                    \App\Models\Attachment::class,
                    'attachable',
                    'data_model',
                    'data_id');
    }

    // NOTE: fix this
    protected static function boot() {
       parent::boot();

       static::deleting(function($coverage) { 
            $user->photos()->delete();
            $coverage->delete();
       });
   }
}
