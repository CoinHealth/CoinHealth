<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetUpPatientMedicalTables extends Migration
{
    
    public function up()
    {
        Schema::create('patient_conditions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->string('name');
            $table->date('date_diagnosed')->nullable();
            $table->tinyInteger('status');
            $table->string('internal_notes');
            $table->timestamps();
        });

        Schema::create('patient_habits', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->string('health_status');
            $table->string('exercise_frequency');
            $table->string('type_of_exercise');
            $table->timestamps();
        });

        Schema::create('patient_diets', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->integer('meals');
            $table->string('special_diet'); 
            $table->string('dairy_products');
            $table->string('lactose_intolerant');
            $table->string('fruits');
            $table->string('soy');
            $table->string('fish');
            $table->timestamps();

        });

        Schema::create('patient_tobaccos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->string('smoker');
            $table->string('currently_smoking');
            $table->integer('sticks_per_day');
            $table->integer('smoking_age');
            $table->integer('quit_smoking_age');
            $table->string('about_quitting');
            $table->string('other_tobacco');
            $table->timestamps();

        });

        Schema::create('patient_caffeines', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->string('drinking');
            $table->integer('number_of_glasses');
            $table->timestamps();

        });

        Schema::create('patient_alcohol_drugs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->string('drinking');
            $table->integer('number_of_glasses');
            $table->string('drinks_in_morning');
            $table->string('cut_down_drinking');
            $table->string('felt_guilty');
            $table->string('alcoholic');
            $table->string('use_drugs');
            $table->timestamps();
        });

        Schema::create('patient_abuses', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->string('physically_abused');
            $table->string('sexually_abused');
            $table->string('verbally_abused');
            $table->string('had_abuse_counseling');
            $table->timestamps();
        });

        Schema::create('patient_stresses', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->string('major_stressors');
            $table->string('changes_in_family_health');
            $table->string('handle_stress');
            $table->string('relaxing_activities');
            $table->timestamps();
        });

        Schema::create('patient_surgeries', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->string('problem');
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('patient_questionnaires', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->string('hot_flashes');
            $table->string('night_sweats');
            $table->string('difficulty_getting_sleep');
            $table->string('difficulty_staying_asleep');
            $table->string('heart_palpitations');
            $table->string('skin_itching');
            $table->string('feels_tired');
            $table->string('difficulty_concentrating');
            $table->string('poor_memory');
            $table->string('irritable');
            $table->string('anxious');
            $table->string('depressed');
            $table->string('mood_swings');
            $table->string('crying_spells');
            $table->string('headaches');
            $table->string('urine_often');
            $table->string('urine_leak');
            $table->string('urine_pain');
            $table->string('bladder_infections');
            $table->string('uncontrollable_loss_stool_gas');
            $table->string('dry_vagina');
            $table->string('vaginal_itching');
            $table->string('intercourse_pain');
            $table->string('intercourse_bleeding');
            $table->string('lack_sexual_desire');
            $table->string('difficulty_orgasm');
            $table->string('limited_sexual_opportunity');
            $table->string('bloated_gain_weight');
            $table->string('breast_tenderness');
            $table->string('joint_pains');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('patient_conditions');
        Schema::dropIfExists('patient_habits');
        Schema::dropIfExists('patient_diets');
        Schema::dropIfExists('patient_tobaccos');
        Schema::dropIfExists('patient_caffeines');
        Schema::dropIfExists('patient_alcohol_drugs');
        Schema::dropIfExists('patient_abuses');
        Schema::dropIfExists('patient_stresses');
        Schema::dropIfExists('patient_surgeries');
        Schema::dropIfExists('patient_questionnaires');
    }
}
