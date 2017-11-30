<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subsidy extends Model {

	protected $fillable = [
 		'state_abbr',
 		'expanded',
 		'age_0_to_1_medicaid_funded',
 		'age_0_to_1_chip_funded',
 		'age_1_to_5_medicaid_funded',
 		'age_1_to_5_chip_funded',
 		'age_6_to_18_medicaid_funded',
 		'age_6_to_18_chip_funded',
 		'separate_chip',
 		'upper_income_limit',
 		'pregnant_medicaid',
 		'pregnant_chip',
 		'adults_parents',
 		'adults_other',
 		'base_fpl',
 		'base_fpl_2',
 		'base_fpl_3',
 		'base_fpl_4',
 		'base_fpl_5',
 		'base_fpl_6',
 		'base_fpl_7',
 		'base_fpl_8',
 		'additional_cost',
 		'marketplace_type',
 		'owned_marketplace',
		'offer_doctor',
 		'tax_rate',
	];

	public function location()
	{
		return $this->belongsTo(\App\Models\Location::class, 'state_abbr', 'state_abbr');
	}

	public function isStateBased()
	{
		return $this->marketplace_type == 1;
	}
	/**
	 * Get the Base Value of Depending on the Size;
	 * @param  [type] $count [description]
	 * @return [type]        [description]
	 */
	public function getBaseFPL($count)
	{
		$base_fpl = $count <= 8 ? $count : 8;
		$base_fpl = 'base_fpl_' . $base_fpl;
		return $count > 8 ? $this->$base_fpl + (($count-8) * $this->additional_cost) : $this->$base_fpl;
	}
}
