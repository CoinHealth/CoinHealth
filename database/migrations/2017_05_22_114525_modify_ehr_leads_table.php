<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyEhrLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ehr_leads', function(Blueprint $table) {
            $table->dropColumn('is_assist');
            $table->integer('status')->after('date')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ehr_leads', function(Blueprint $table) {
            $table->integer('is_assist')->after('date')->default(0);
            $table->dropColumn('status');
        });
    }
}
