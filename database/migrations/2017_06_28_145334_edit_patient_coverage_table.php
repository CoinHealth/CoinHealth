<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditPatientCoverageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_coverage', function(Blueprint $table) {
            $table->text('insurance')->after('insurance_card_path'); // object
            $table->text('careparrot')->after('insurance'); // object
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
            $table->dropColumn(['insurance', 'careparrot']);
        });
    }
}
