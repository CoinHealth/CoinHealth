<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientInjuriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_injuries', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->string('operation');
            $table->text('hospitalizations');
            $table->string('psychological_therapy');
            $table->text('major_injuries');
            $table->text('illnesses');
            $table->dateTime('date');
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
        Schema::dropIfExists('patient_injuries');
    }
}
