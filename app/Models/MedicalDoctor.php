<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Specialization;
use App\Traits\TraitGetTableName;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use App\Traits\Bookmark as BookmarkTrait;

class MedicalDoctor extends Model {
	use AlgoliaEloquentTrait, TraitGetTableName, BookmarkTrait;

	protected $table = 'medical_doctors';

	public $indices = ['medical_doctors'];

	public static $objectIdKey = 'id';

	public static $autoIndex = false;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'title',
        'address',
        'phone',
        'gender',
        'medical_education',
        'languages',
    ];

    protected $casts = [
        'languages' => 'array',
        'phone' => 'array',
        'address' => 'object',
    ];

	public $algoliaSettings = [
		'searchableAttributes' => [
            'first_name',
            'last_name',
			'middle_name',
			'specializations.name',
			'address.city',
			'address.state',
			'address.zip',
			'unordered(gender)',
			'unordered(title)',
        ],
        'customRanking' => [
			"desc(last_name)"
        ],
    ];

	protected $appends = [
		'full_name',
	];

	public function specializations()
	{
		return $this->morphMany(Specialization::class, 'specializable')
					->select(['id', 'name','description']);
	}

	public function getFullNameAttribute()
	{
		return $this->first_name .' '. $this->middle_name .' '. $this->last_name .', '. $this->title;
	}

	public function getAlgoliaRecord()
	{
		$this->specializations;
		return $this->toArray();
	}
}
