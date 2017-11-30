<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Symptom;
use App\Pivots\PrimaryPivot;
use App\Models\Medication;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use App\Traits\TraitGetTableName;
class Condition extends Model {
	use AlgoliaEloquentTrait, TraitGetTableName;

	protected $table = 'medical_conditions';

	public $indices = ['medical_conditions'];

	public static $autoIndex = false;

	public static $objectIdKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'symptoms',
        'tests',
        'treatment',
		'medications',
		'facilities',
    ];

    protected $casts = [
        'tests' => 'array',
		'medications' => 'array',
		'facilities' => 'array',
    ];

	public $algoliaSettings = [
        'searchableAttributes' => [
            'name',
			'symptoms'
        ],
    ];

	public function healthSymptoms()
	{
		return $this->belongsToMany(Symptom::class, 'condition_symptom')
					->withPivot('tags')
					->withTimestamps();
	}

	public function newPivot(Model $parent, array $attributes, $table, $exists) {
        return new PrimaryPivot($parent, $attributes, $table, $exists);
    }
}
