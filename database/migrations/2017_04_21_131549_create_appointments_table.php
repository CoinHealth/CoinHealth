<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned(); // link to patient
            $table->integer('provider_id')->unsigned(); // link to provider
            $table->string('reason')->nullable();
            $table->timestamp('scheduled_on');
            $table->smallInteger('minutes')->default(5);
            $table->string('appointment_profile')->nullable();
            $table->string('exam_room', 100);
            $table->boolean('is_active')->default(false);
            $table->string('doctors_note');
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
        Schema::dropIfExists('appointments');
    }
}
