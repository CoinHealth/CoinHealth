<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class EhrLead extends Model
{
    // patient setting up an appointment to provider
    protected $table = 'ehr_leads';

   	protected $fillable = [
        'user_id',
        'provider_id',
        'date',
        'reason',
        'status',
   	];

   	protected $with = [
        'user',
        'provider',
        'appointment',
    ];

    protected $appends = [
      'lead_status',
      'app_date',
    ];  

	 public function user()
  	{
  		return $this->hasOne(\App\Models\User::class, 'id', 'user_id');
  	} 

  	public function provider()
  	{
  		return $this->hasOne(\App\Models\Provider::class, 'id', 'provider_id');
  	} 

    public function getLeadStatusAttribute() 
    {
      $status = $this->status;
      switch ($status) {
        case 0:
          $status = 'Needs Confirmation';
          break;
        case 1: 
          $status = 'Confirmed';
          break;
        case 2:
          $status = 'Cancelled';
          break;
        default:
          $status = 'Needs Confirmation';
          break;
      }

      return $status;
    }

    public function getAppDateAttribute()
    {
      return Carbon::parse($this->date)->toDateString() . 'T' . Carbon::parse($this->date)->toTimeString();
    }

    public function appointment()
    {
      return $this->hasOne(\App\Models\Appointment::class);
    }

}
