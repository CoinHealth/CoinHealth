<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Agent;

class Quote extends Model {

	  protected $connection = 'mysql_crm';

	  protected $fillable = [
		  'uuid',
		  'invoice',
		  'applicants',
		  'additional_information',
		  'email',
		  'billing_address',
		  'payment_info',
		  'plan',
		  'status',
		  'agreements',
	  ];

	  public function getDecodedApplicantsAttribute()
	  {
		  return json_decode($this->applicants);
	  }

	  public function agent()
	  {
		  return $this->belongsTo(Agent::class, 'agent_quote')
		  ->where('quotes.email', auth()->user()->email);
	  }


}
