<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupPatientCoverageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_coverage', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('has_coverage')->default(false);
            $table->integer('patient_id')->unsigned();
            $table->string('insurance_provider_name', 30)->nullable();
            $table->string('insurance_provider_id', 50)->nullable();
            $table->string('signature_path')->nullable(); // should be attachments
            $table->string('insurance_card_path')->nullable();  // should be attachments
            $table->foreign('patient_id')
                ->references('id')->on('patients')
                ->onDelete('cascade');

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
        Schema::table('patient_coverage', function(Blueprint $table) {
            $table->dropForeign(['patient_id']);
        });
        Schema::drop('patient_coverage');
    }
}
