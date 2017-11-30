<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function(Blueprint $table) {
            $table->integer('ehr_lead_id')->after('id')->nullable();
            $table->dropColumn('is_active');
            $table->tinyInteger('status')->after('exam_room')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function(Blueprint $table) {
            $table->dropColumn('ehr_lead_id');
            $table->dropColumn('status');
            $table->boolean('is_active')->after('exam_room')->default(1);
        });
    }
}
