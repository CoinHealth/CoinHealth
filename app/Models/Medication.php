<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BrandedMedications;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use App\Traits\Bookmark as BookmarkTrait;
use App\Traits\TraitGetTableName;
class Medication extends Model {
	use AlgoliaEloquentTrait, TraitGetTableName, BookmarkTrait;

	protected $fillable = [
        'generic_name',
        'condition',
        'side_effects',
    ];

	public $indices = ['medications'];

	public static $objectIdKey = 'id';
	public static $autoIndex = false;

	protected $casts = [
		'side_effects' => 'object',
	];

	public $algoliaSettings = [
        'searchableAttributes' => [
            'generic_name',
			'branded_medications.brand_name',
			'condition',
			'side_effects.severe_or_persisting_symptoms',
			'side_effects.symptoms_that_can_be_serious',
			// NOTE:70 leave it for now..
			// 'side_effects.symptoms_that_may_cause_of_low_blood_sugar_levels',
			// 'side_effects.evere_symptoms_if_low_blood_sugar_is_not_treated',
			// 'side_effects.side_symptoms_that_may_cause_of_high_blood_sugar_levels',
			// 'side_effects.symptoms_that_could_cause_diabetic_ketoacidosis_if_high_blood_sugar_is_not_treated',
        ],
    ];

	public function brandedMedications()
	{
		return $this->hasMany(BrandedMedications::class, 'generic_id');
	}
}
