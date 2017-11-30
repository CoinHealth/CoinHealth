<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Hashid;
use App\Models\Insurance;
use App\Models\PatientFlag;
use App\Models\PatientVital;
use App\Models\PatientMedication;

class Patient extends Model
{
    use Hashid;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'gender',
        'blood_type',
        'dob',
        'current_address',
        'billing_address',
        'ssn',
        'language',
        // 'ethnicity',
        'problems',
        'race',
        'contact_home',
        'contact_cell',
        'contact_work',
        'emergency_contact_person',
        'emergency_contact_relation',
        'emergency_contact_no',
        'patient_notes',
        'preferred_communication',
        'employer',
        'spouse_name',
        'spouse_dob',
        'responsible_party',
        'parent_status',
        'referring_physician',
        'primary_care_physician',
        'pharmacy',
        'is_provider_generated',
        'provider_id',
    ];

    protected $casts = [
        'blood_type' => 'object',
        'billing_address' => 'object',
        'current_address' => 'object',
        'language' => 'array',
        'problems' => 'array',
    ];

    protected $appends = [
        'avatar_path',
        'url_id',
        'name',
        'address',
        'age',
    ];

    protected $with = [
        // 'payments',
        'latest_vital',
        'conditions',
        'insurances',
        'medications',
        'allergies',
        'injuries',
        'flags',
        'habits',
        'diets',
        'surgeries',
        'caffeine',
        'tobacco',
        'alcohol_drugs',
        'abuse',
        'stress',
        'questionnaire',
        'family_history',
        'laboratories',
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id'); // link to user model if the patint is authenticaed
    }

    public function coverage()
    {
        return $this->hasOne(\App\Models\Coverage::class);
    }

    public function payments()
    {
        return $this->hasMany(\App\Models\Payment::class, 'patient_id')->orderBy('id', 'desc');
    }

    public function payment_logs()
    {
        return $this->morphMany('App\Models\Record', 'taggable')
                    ->where('recordable_type', 'App\Models\Payment')
                    ->orderBy('created_at', 'desc');
    }

    public function appointments()
    {
        return $this->hasMany(\App\Models\Appointment::class);
    }

    public function allergies()
    {
        return $this->hasMany(\App\Models\PatientAllergy::class);
    }

    public function injuries()
    {
        return $this->hasMany(\App\Models\PatientInjury::class);
    }

    public function medications()
    {
        return $this->hasMany(PatientMedication::class);
    }

    public function vitals()
    {
        return $this->hasMany(PatientVital::class);
    }

    public function flags()
    {
        return $this->hasMany(PatientFlag::class);
    }

    public function laboratories()
    {
        return $this->hasMany(\App\Models\PatientLaboratory::class);
    }

    public function providers()
    {
        return $this->belongsToMany(\App\Models\User::class, 'patient_provider', 'patient_id', 'provider_id')
                    ->withPivot('is_active')
                    ->withTimestamps();
    }

    public function insurances()
    {
        return $this->hasMany(Insurance::class);
    }

    public function getAvatarPathAttribute()
    {
        return $this->avatar ? $this->avatar : '/images/profile-default.png';
    }

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    public function getAddressAttribute()
    {
        $address = $this->current_address;
        $city = isset($address->city) ? $address->city . ', ' : '';
        $state = isset($address->state) ? $address->state . ', ' : '';
        $zip = isset($address->location_id) ? $address->location_id : '';
        $full_address = $city . $state . $zip;
        return $full_address;
    }

    // MEDICALS
    public function latest_vital()
    {
        return $this->hasOne(\App\Models\PatientVital::class)->latest();
    }

    public function conditions()
    {
        return $this->hasMany(\App\Models\PatientCondition::class);
    }

    public function habits()
    {
        return $this->hasOne(\App\Models\PatientHabit::class);
    }

    public function diets()
    {
        return $this->hasOne(\App\Models\PatientDiet::class);
    }

    public function caffeine()
    {
        return $this->hasOne(\App\Models\PatientCaffeine::class);
    }

    public function tobacco()
    {
        return $this->hasOne(\App\Models\PatientTobacco::class);
    }

    public function alcohol_drugs()
    {
        return $this->hasOne(\App\Models\PatientAlcoholDrug::class);
    }

    public function abuse()
    {
        return $this->hasOne(\App\Models\PatientAbuse::class);
    }

    public function stress()
    {
        return $this->hasOne(\App\Models\PatientStress::class);
    }

    public function family_history()
    {
        return $this->hasOne(\App\Models\PatientFamilyHistory::class);
    }

    public function surgeries()
    {
        return $this->hasOne(\App\Models\PatientSurgery::class);
    }

    public function questionnaire()
    {
        return $this->hasOne(\App\Models\PatientQuestionnaire::class);
    }

    public function getAgeAttribute()
    {
        if($this->dob) {

            $dob = \Carbon\Carbon::parse($this->dob)->format('m/d/Y') ;
            $dob = explode("/", $dob);
            $age = (date("md", date("U", mktime(0, 0, 0, $dob[0], $dob[1], $dob[2]))) < date("md")
                ? ((date("Y") - $dob[2]) - 1)
                : (date("Y") - $dob[2]));
        }
        else {
            $age = '';
        }
        return $age;
    }     

}
