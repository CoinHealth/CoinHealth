<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientMedicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_medications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('medication_id')->unsigned()->nullable(); // link to medications table
            $table->string('medication_name');
            $table->string('sig');
            $table->float('dispense')->default(0)->unsigned();
            $table->integer('refills')->unsigned()->default(0);
            $table->boolean('daw')->default(false);
            $table->string('pharmacy_note')->nullable();
            $table->string('indication');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('prn')->default(false);
            $table->boolean('active')->default(true);
            $table->string('internal_notes');
            $table->timestamps();

            $table->foreign('patient_id')
                    ->references('id')->on('patients')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_medications', function(Blueprint $table) {
            $table->dropForeign(['patient_id']);
        });
        Schema::dropIfExists('patient_medications');
    }
}
