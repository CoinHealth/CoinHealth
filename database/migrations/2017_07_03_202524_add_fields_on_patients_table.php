<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsOnPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function(Blueprint $table) {
            $table->string('preferred_communication');
            $table->string('employer');
            $table->string('spouse_name');
            $table->string('spouse_dob');
            $table->string('responsible_party');
            $table->string('parent_status');
            $table->string('referring_physician');
            $table->string('primary_care_physician');
            $table->string('pharmacy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function(Blueprint $table) {
            $table->dropColumn([
                'preferred_communication',
                'employer',
                'spouse_name',
                'spouse_dob',
                'responsible_party',
                'parent_status',
                'referring_physician',
                'primary_care_physician',
                'pharmacy',
            ]);
        });
    }
}
