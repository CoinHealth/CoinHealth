<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_allergies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->boolean('active')->default(true);
            $table->smallInteger('allergy_type'); // 1 = Specific Drug, 2 = Class of Drugs, 3 = Other allergy
            $table->string('name');
            $table->string('reaction');
            $table->string('notes');
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
        Schema::table('patient_allergies', function(Blueprint $table) {
            $table->dropForeign(['patient_id']);
        });
        Schema::dropIfExists('patient_allergies');
    }
}
