<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientLaboratory extends Model
{
    protected $table = 'patient_laboratories';

    protected $fillable = [
    	'patient_id',
    	'procedure',
        'date',
        'where',
        'facility',
        'how_often',
        'result',
        'comments',
        'uploaded_by',
    ];

    protected $with = [
        'attachments',
    ];


    public function patient()
    {
    	return $this->belongsTo(\App\Models\Patient::class);
    }

    public function user()
    {
    	return $this->belongsTo(\App\Models\User::class, 'uploaded_by');
    }

    public function attachments()
    {
        return $this->morphMany(
                        \App\Models\Attachment::class, 
                        'attachable', 
                        'data_model',
                        'data_id')
                        ->where('file_type', 11);
    }

}
