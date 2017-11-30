<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use App\Traits\TraitGetTableName;
use App\Traits\Bookmark as BookmarkTrait;

class MedicalFacility extends Model {
    use AlgoliaEloquentTrait, TraitGetTableName, BookmarkTrait;

    protected $table = 'medical_facilities';
    protected $fillable = [
        'general_name',
        'name',
        'category',
        'address',
        'phone',
    ];

    public $indices = ['medical_facilities'];

    public static $objectIdKey = 'id';
    public static $autoIndex = false;

    protected $casts = [
        'address' => 'object',
        'phone' => 'array',
    ];

    public $algoliaSettings = [
		'searchableAttributes' => [
            'general_name',
            'name',
			'category',
			'address.city',
			'address.state',
			'address.zip_code',
        ],
        'customRanking' => [
			"asc(general_name)"
        ],
    ];

    public function getAlgoliaRecord()
	{
		return $this->toArray();
	}

}
