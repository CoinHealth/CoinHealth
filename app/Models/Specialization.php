<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use App\Traits\TraitGetTableName;
class Specialization extends Model {
	use AlgoliaEloquentTrait, TraitGetTableName;

	public $indices = ['specializations'];

	public static $objectIdKey = 'id';

	protected $fillable = [
        'name',
        'specializable_id',
        'specializable_type',
        'description',
    ];

	public function specializable()
	{
		return $this->morphTo();
	}

}
