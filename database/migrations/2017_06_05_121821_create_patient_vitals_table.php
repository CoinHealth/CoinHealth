<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientVitalsTable extends Migration
{
  
    public function up()
    {
        Schema::create('patient_vitals', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->integer('temperature');
            $table->integer('pulse');
            $table->text('blood_pressure');
            $table->integer('respiratory_rate');
            $table->integer('oxygen_saturation');
            $table->text('height');
            $table->integer('weight');
            $table->integer('bmi');
            $table->integer('pain');
            $table->string('smoking');
            $table->integer('head_circumference');
            $table->text('customs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patient_vitals');
    }
}
