<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropFieldsOnPatientQuestionnares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_questionnaires', function (Blueprint $table) {
            $table->dropColumn([
                'dry_vagina',
                'vaginal_itching',
                'intercourse_bleeding',
                'bloated_gain_weight',
                'breast_tenderness',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_questionnaires', function (Blueprint $table) {
            $table->string('dry_vagina');
            $table->string('vaginal_itching');
            $table->string('intercourse_bleeding');
            $table->string('bloated_gain_weight');
            $table->string('breast_tenderness');
        });
    }
}
