<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use App\Pivots\PrimaryPivot;
use App\Models\Condition;
use App\Traits\TraitGetTableName;
class Symptom extends Model {
	use AlgoliaEloquentTrait, TraitGetTableName;

	public $indices = ['symptoms'];

	public static $objectIdKey = 'id';
	public static $autoIndex = false;
	protected $fillable = [
        'name',
    ];

	public $algoliaSettings = [
        'searchableAttributes' => [
            'name',
			'possible_conditions.name',
        ],
    ];

	public function possibleConditions()
	{
		return $this->belongsToMany(Condition::class, 'condition_symptom')
					->withPivot('tags')
					->withTimestamps();
	}

	public function newPivot(Model $parent, array $attributes, $table, $exists) {
        return new PrimaryPivot($parent, $attributes, $table, $exists);
    }
}
