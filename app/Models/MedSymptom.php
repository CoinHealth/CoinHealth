<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use App\Pivots\PrimaryPivot;
// use Tealiedie\BelongsToMany\Relation\BelongsToMany as TBelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MedSymptom extends Model
{
    use AlgoliaEloquentTrait;
    // use TBelongsToMany;
    public $indices = ['med_symptoms'];
    public static $objectIdKey = 'id';
	public static $autoIndex = false;

    protected $primaryKey = 'uid';

    public $algoliaSettings = [
        'searchableAttributes' => [
            'name',
			'conditions.name',
        ],
    ];

    public $incrementing = false;

    protected $table = 'med_symptoms';

    protected $fillable = [
        'uid',
        'name',
    ];

    public function conditions()
    {
        $rel = $this->belongsToMany(\App\Models\MedCondition::class, 'condition_symptom', 'symptom_id', 'condition_id')
                    ->withPivot('tags')
                    ->withTimestamps();
        return $rel;
    }

    public function newPivot(Model $parent, array $attributes, $table, $exists) {
        return new PrimaryPivot($parent, $attributes, $table, $exists);
    }
}
