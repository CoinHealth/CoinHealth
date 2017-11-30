<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTypeMajorStressorsOnPatientStresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_stresses', function(Blueprint $table) {
            $table->text('major_stressors')->change();
            $table->text('other_stressors')->after('major_stressors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_stresses', function(Blueprint $table) {
            $table->string('major_stressors')->change();
            $table->dropColumn('other_stressors');
        });
    }
}
