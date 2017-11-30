<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;

class MedCondition extends Model
{
    use AlgoliaEloquentTrait;

    protected $primaryKey = 'uid';

    public $incrementing = false;
    public $indices = ['med_conditions'];
    public static $autoIndex = false;
	public static $objectIdKey = 'id';

    public $algoliaSettings = [
        'searchableAttributes' => [
            'name',
			'symptoms'
        ],
    ];

    protected $table = 'med_conditions';

    protected $fillable = [
        'uid',
        'name',
        'description',
        'life_threatening',
        'other_specific_tests',
        'icd',
        'symptoms',
        'treatment',
        'workup',
        'medications',
        'medical_facility_categories',
        'medical_specialties',
        'medical_tests',
    ];

    protected $casts = [
        'icd' => 'object',
        'medications' => 'array',
        'medical_facility_categories' => 'array',
        'medical_specialties' => 'array',
        'medical_tests' => 'array',
    ];

    public function symptoms()
    {
        return $this->belongsToMany(\App\Models\MedSymptom::class, 'condition_symptom', 'uid', 'uid');
    }
}
