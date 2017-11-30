<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable = [
		'category_code',
		'category_desc',
		'title',
		'value'
	];

	/**
	 * MarketplaceType
	 */
	public function scopeMarketplaceType($qry)
	{
		return $qry->where('category_code', 'like', '1000000%');
	}

	/**
	 * TaxStatus
	 */
	public function scopeTaxStatus($qry)
	{
		return $qry->where('category_code', 'like', '2000000%');
	}


	/**
	 * Income Type
	 */
	public function scopeIncomeType($qry)
	{
		return $qry->where('category_code', 'like', '3000000%');
	}

	/**
	 * Immigration Documents
	 */
	public function scopeImmigrationDocuments($qry)
	{
		return $qry->where('category_code', 'like', '4000000%');
	}

	public function scopeExceptionalCircumstances($qry)
	{
		return $qry->where('category_code', 'like', '5000000%');
	}

	public function scopeLevels($qry)
	{
		return $qry->where('category_code', 'like', '000060%');
	}

	public function scopeQuoteStatus($qry)
	{
		return $qry->where('category_code', 'like', '000070%');
	}

	public function scopeSpecializations($qry)
	{
		return $qry->where('category_code', 'like', '000080%');
	}

	public function scopeDoctorDegree($qry)
	{
		return $qry->where('category_code', 'like', '000090%');
	}

	public function scopeSigDosages($qry)
	{
		return $qry->where('category_code', 'like', '000100%');
	}

	public function scopeSigUnits($qry)
	{
		return $qry->where('category_code', 'like', '000110%');
	}

	public function scopeSigRoutes($qry)
	{
		return $qry->where('category_code', 'like', '000120%');
	}

	public function scopeSigFrequencies($qry)
	{
		return $qry->where('category_code', 'like', '000130%');
	}

	public function scopeSigDirections($qry)
	{
		return $qry->where('category_code', 'like', '000140%');
	}

	public function scopeSigDurations($qry)
	{
		return $qry->where('category_code', 'like', '000150%');
	}

	public function scopeFlags($qry)
	{
		return $qry->where('category_code', 'like', '000160%');
	}

	public function scopeMedicalProblems($qry)
	{
		return $qry->where('category_code', 'like', '000170%');
	}

	public function scopeBloodTypes($qry)
	{
		return $qry->where('category_code', 'like', '000180%');
	}

	public function scopeSupportGroupIssues($qry)
	{
		return $qry->where('category_code', 'like', '000190%');
	}

}
