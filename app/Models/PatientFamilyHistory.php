<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientFamilyHistory extends Model
{
    protected $table = 'patient_family_histories';

    protected $fillable = [
    	'patient_id',
        'high_blood',
        'heart_attack',
        'stroke',
        'blood_clots',
        'bleeding_tendency',
        'glaucoma',
        'osteoporosis',
        'hip_fracture',
        'diabetes',
        'breast_cancer',
        'colorectal_cancer',
        'ovarian_cancer',
        'other_type_of_cancer',
        'depression',
        'other_emotional_problems',
        'alzheimer_disease',
        'violence_victim',
        'violence_person',
        'sexual_abuse_victim',
        'sexual_abuse_person',
        'alcoholism',
        'drug_abuse',
    ];

    protected $casts = [
		'high_blood' => 'array',
        'heart_attack' => 'object',
        'stroke' => 'object',
        'blood_clots' => 'array',
        'bleeding_tendency' => 'array',
        'glaucoma' => 'array',
        'osteoporosis' => 'array',
        'hip_fracture' => 'array',
        'diabetes' => 'array',
        'breast_cancer' => 'object',
        'colorectal_cancer' => 'array',
        'ovarian_cancer' => 'array',
        'other_type_of_cancer' => 'array',
        'depression' => 'array',
        'other_emotional_problems' => 'array',
        'alzheimer_disease' => 'array',
        'violence_victim' => 'array',
        'violence_person' => 'array',
        'sexual_abuse_victim' => 'array',
        'sexual_abuse_person' => 'array',
        'alcoholism' => 'array',
        'drug_abuse' => 'array',
	];

}
