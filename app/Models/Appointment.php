<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'ehr_lead_id',
        'patient_id',
        'provider_id',
        'reason',
        'scheduled_on',
        'minutes',
        'appointment_profile',
        'exam_room',
        'status', // 'is_active',
        'doctors_note',
    ];

    protected $with = [
        'lead',
    ];

    protected $appends = [
        // 'appointment_status',
        'scheduled_date',
    ];

    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class, 'patient_id');
    }

    public function provider()
    {
        return $this->belongsTo(\App\Models\Provider::class, 'provider_id', 'id');
    }

    public function lead()
    {
        return $this->belongsTo(\App\Models\EhrLead::class);
    }

    public function getAppointmentStatusAttribute()
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
        case 3:
          $status = 'Arrived';
          break;
        case 4:
          $status = 'In Session';
          break;
        case 5:
          $status = 'Complete';
          break;
        case 6:
          $status = 'Rescheduled';
          break;
        case 7:
          $status = 'No Show';
          break;
        default:
          $status = 'Needs Confirmation';
          break;
      }

      return $status;
    }

    public function getScheduledDateAttribute()
    {
      return \Carbon\Carbon::parse($this->scheduled_on)->toDateTimeString();
    }


}
