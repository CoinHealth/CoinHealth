<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJobTitleInProviderUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provider_user', function (Blueprint $table) {
            $table->string('job_title')->after('user_id');
        });

        Schema::table('providers', function (Blueprint $table) {
            $table->string('operation_hours', 20)->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('provider_user', function (Blueprint $table) {
            $table->dropColumn('job_title');
        });

        Schema::table('providers', function (Blueprint $table) {
            $table->dropColumn('operation_hours');
        });
    }
}
