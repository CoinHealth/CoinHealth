<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model {

	protected $fillable = [
		"first_name",
		"middle_name",
		"last_name",
		"gender",
		"suffix",
		"title",
		"address_1",
		"address_2",
		"city",
		"county",
		"state_abbr",
		"zip_code",
		"phone",
		"fax",
		"specialty",
		"sub_specialty",
		"sub_sub_specialty",
	];

	public function getFullnameAttribute()
	{
		return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
	}
}
