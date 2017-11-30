<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use App\Traits\TraitGetTableName;
class BrandedMedications extends Model {

    use AlgoliaEloquentTrait, TraitGetTableName;

    protected $table = 'branded_medication';

    public $indices = ['branded_medication'];

	public static $objectIdKey = 'id';

    protected $fillable = [
        'generic_id',
        'brand_name',
    ];

    public function genericMedication()
    {
        return $this->belongsTo(App\Models\Medication::class, 'generic_id');
    }

}
