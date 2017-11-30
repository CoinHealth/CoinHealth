<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUsersTableCoverage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('insurance_card')->nullable()->after('remember_token');
            $table->string('insurance_name')->nullable()->after('insurance_card');
            $table->string('digital_id')->nullable()->after('insurance_name');
            $table->string('signature')->nullable()->after('digital_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'insurance_card',
                'insurance_name',
                'digital_id',
                'signature'
            ]);
        });
    }
}
