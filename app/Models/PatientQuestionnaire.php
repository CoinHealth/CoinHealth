<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientQuestionnaire extends Model
{
   	protected $table = 'patient_questionnaires';

   	protected $fillable = [
   		'patient_id',
   		'hot_flashes',
        'night_sweats',
        'difficulty_getting_sleep',
        'difficulty_staying_asleep',
        'heart_palpitations',
        'skin_itching',
        'feels_tired',
        'difficulty_concentrating',
        'poor_memory',
        'irritable',
        'anxious',
        'depressed',
        'mood_swings',
        'crying_spells',
        'headaches',
        'urine_often',
        'urine_leak',
        'urine_pain',
        'bladder_infections',
        'uncontrollable_loss_stool_gas',
        'intercourse_pain',
        'lack_sexual_desire',
        'difficulty_orgasm',
        'limited_sexual_opportunity',
        'joint_pains',
   	];

   	public function patient()
   	{
   		return $this->belongsTo(\App\Models\Patient::class);
   	}
}
