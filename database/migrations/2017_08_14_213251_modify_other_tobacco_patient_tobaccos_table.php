<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyOtherTobaccoPatientTobaccosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_tobaccos', function (Blueprint $table) {
            $table->text('other_tobacco')->change();
            $table->text('other_tobacco_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_tobaccos', function (Blueprint $table) {
            $table->string('other_tobacco')->change();
            $table->dropColumn('other_tobacco_type');
        });
    }
}
