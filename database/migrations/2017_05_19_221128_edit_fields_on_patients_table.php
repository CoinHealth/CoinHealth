<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditFieldsOnPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn(['name', 'address']);
            $table->string('first_name', 100)->after('user_id');
            $table->string('middle_name', 100)->after('first_name')->nullable();
            $table->string('last_name', 100)->after('middle_name');
            $table->text('current_address')->nullable()->after('dob');
            $table->text('billing_address')->nullable()->after('current_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn([
                'first_name',
                'middle_name',
                'last_name',
                'current_address',
                'billing_address',
            ]);
            $table->string('name')->after('user_id');
            $table->text('address')->nullable()->after('dob');
        });
    }
}
