<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('med_conditions', function(Blueprint $table) {
            $table->increments('id');
            $table->string('uid', 20);
            $table->string('name');
            $table->text('description');
            $table->boolean('life_threatening')->default(false);
            $table->text('other_specific_tests');
            $table->text('icd'); // object
            $table->text('symptoms');
            $table->text('treatment');
            $table->text('workup');
            $table->text('medications'); // array
            $table->text('medical_facility_categories'); // array
            $table->text('medical_specialties'); // array
            $table->text('medical_tests'); // array

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('med_conditions');
    }
}
