<?php namespace App\Commands;

use App\Commands\Command;
use App\Commands\GetPlansCommand;
use App\Commands\GetMonthlyPremium;

use Bus;
use App\Models\Issuer;
class GetFilteredPlanCommand extends Command  {


	private $applicants;
	private $options;
	private $subsidy;
	private $_options;
	private $csr;
	private $familyType;
	private $otherWhere;

	public function __construct($applicants, $options, $subsidy, $csr, $otherWhere)
	{
		$this->applicants = $applicants;
		$this->options = $options;
		$this->_options = $options;
		$this->subsidy = $subsidy;
		$this->csr = $csr;
		$this->otherWhere = $otherWhere;
	}

	public function handle()
	{
		$subsidy = $this->subsidy;
		$pufs = $this->getPUF();
		$issuers = $this->getIssuers();
		$this->familyType = $this->getFamilyType();

		$types = [
			'younger' => [],
			'older' => [],
			'young_adults' => [],
			'adults' => [],
		];

		foreach($this->applicants as $applicant) {
			array_push($types[ $applicant['applicantAge'] <= 20 ? 'younger' : 'older' ] , $applicant['applicantAge']);
			array_push($types[ $applicant['applicantAge'] < 30 ? 'young_adults' : 'adults'], $applicant['applicantAge']);
		}

		$child_only_offering = '';
		$plan_metal = '';
		if (!empty($types['younger']) && empty($types['older']) ) {
			$child_only_offering = 'Allows Child-Only';
		}
		else if (!empty($types['older']) && empty($types['younger']) ) {
			$child_only_offering = 'Allows Adult-Only';
		}
		if ( (!empty($types['young_adults']) && !empty($types['adults'])) || (empty($types['young_adults'])) )
			$plan_metal = " AND metal_level != 'Catastrophic'";
		// dd($issuers);
		$this->appendOption([
			// '$where' => "child_only_offering IN ('$child_only_offering', 'Allows Adult and Child-Only') AND rating_area='".$this->otherWhere['rating_area']."' AND state_code='".$this->otherWhere['state_code']."' AND county_name='".$this->otherWhere['county_name']."'".$plan_metal,
			'$where' => "$issuers and child_only_offering IN ('$child_only_offering', 'Allows Adult and Child-Only') AND rating_area='".$this->otherWhere['rating_area']."' AND state_code='".$this->otherWhere['state_code']."' AND county_name='".$this->otherWhere['county_name']."'".$plan_metal,
		]);


		$this->setSelectStandards();
		$plans = Bus::dispatch(new GetPlansCommand($this->getOptions()));
		$plans = array_map(function($item) use ($subsidy, $pufs) {

			$puf = $this->searchPUF( $pufs, 'planid', $item['plan_id_standard_component'] );

			$premium = Bus::dispatch(new GetMonthlyPremium($this->applicants, $this->options, $item, $puf));
			$item['premium'] = round($premium);
			$applied = round($premium - $subsidy);
			$item['subsidy_applied'] = $applied > 0 ? $applied : 0;
			return $item;
		}, $plans);

		return $plans;
	}

	function getIssuers()
	{
		$state_code = $this->otherWhere['state_code'];
		$issuers = Issuer::where('state_abbr', $state_code)->get();
		$_issuers = [];
		foreach($issuers as $issuer) {
			// array_push($_issuers, "plan_id_standard_component LIKE '".$issuer->issuer_id . $state_code ."%'"); // 2016 QHP landscape code
			array_push($_issuers, "hios_issuer_id = '".$issuer->issuer_id."'");
		}
		return "(".implode(' OR ', $_issuers) . ") ";
	}

	private function searchPUF($pufs, $field, $value)
	{
		foreach($pufs as $key => $product)
		{
			if ( $product[$field] === $value )
				return $product;
		}
		return null;
	}
	/**
	 *  Custom setters and getters
	 */
	private function getPUF()
	{
		$pufuckingf = Bus::dispatch(new GetPUFCommand([
			'ratingareaid' => $this->otherWhere['rating_area'],
			'statecode' => $this->otherWhere['state_code'], // 2016 pufucking code
			// 'location_1_state' => $this->otherWhere['state_code'], // 2017 pufucking code
		]));
		return $pufuckingf;
	}

	private function getFamilyType()
	{
		$_applicant = [];
		$type = 'individual';
		foreach($this->applicants as $applicant) {
			if ($applicant['subsidy'])
				array_push($_applicant, $applicant);
		}
		$count = count($_applicant);
		if ($count > 1)
			$type = $count > 2 ? 'family' : 'family_per_person';
		return $type;
	}

	private function setSelectStandards()
	{
		$csr = str_replace('%', '', $this->csr);
		$type = $this->familyType;
		$_options = [
			"emergency_room" => "emergency_room",
			"generic_drugs" => "generic_drugs",
			"specialist" => "specialist",
			"specialty_drugs" => "specialty_drugs",
			"inpatient_facility" => "inpatient_facility",
			"inpatient_physician" => "inpatient_physician",
			"preferred_brand_drugs" => "preferred_brand_drugs",
			"primary_care_physician" => "primary_care_physician",
			"non_preferred_brand_drugs" => "non_preferred_brand_drugs",
		];
		$_secOptions = [
			'drug_deductible' => 'drug_deductible',
			'drug_maximum_out_of_pocket' => 'drug_maximum_out_of_pocket',
			'medical_deductible' => 'medical_deductible',
			'medical_maximum_out_of_pocket' => 'medical_maximum_out_of_pocket',
		];
		$_secOptions = array_map(function($opt) use ($type) {
			return $opt = $opt .'_'.$type;
		}, $_secOptions);
		$select = [];
		$merged = array_merge($_options, $_secOptions);
		$csr = 94;
		foreach($merged as $opt=>$value) {
			$_value = $csr > 70 ? $csr . '_percent' : 'standard';
			$newValue = $value . '_'. $_value;
			$val = "CASE (metal_level='Silver', ". $newValue .", NOT metal_level = 'Silver', ". $value.'_standard' ." ) AS $opt";
			array_push($select, $val);
		}
		$_final = array_merge($select, $this->getSelectOptions());
		// dd($_final);
		$_select = implode(', ', $_final);
		$this->appendOption([
			'$select' => $_select,
		]);
	}

	private function appendOption($options)
	{
		$this->setOptions(array_merge($this->getOptions(), $options));
	}

	private function setOptions($options)
	{
		$this->options = $options;
	}

	private function getSelectOptions()
	{
		return $_select = [
			"child_dental",
			"child_only_offering",
			"customer_service_phone_number_local",
			"customer_service_phone_number_toll_free",
			"customer_service_phone_number_tty",
			"ehb_percent_of_total_premium",
			"issuer_name",
			"drug_formulary_url",
			"network_url",
			"plan_brochure_url",
			"summary_of_benefits_url",
			"plan_id_standard_component",
			"plan_marketing_name",
			"plan_type",
			"premium_adult_individual_age_21",
			"source",
			"county_name",//
			"metal_level", //
			"rating_area", //
			"state_code", //
		];
	}
	private function getOptions()
	{
		return $this->options;
	}

}
