<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProblemIdOnPatientProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_conditions', function(Blueprint $table) {
            $table->string('problem_id')->after('name');
            $table->string('status')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_conditions', function(Blueprint $table) {
            $table->dropColumn('problem_id');
            $table->integer('status')->change();
        });
    }
}
