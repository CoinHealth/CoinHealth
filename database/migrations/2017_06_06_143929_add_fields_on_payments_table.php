<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsOnPaymentsTable extends Migration
{

    public function up()
    {
        Schema::table('payments', function(Blueprint $table) {
            $table->string('invoice_no')->after('id');
            $table->integer('status')->default(0)->after('billed_to');
            $table->integer('user_id')->after('company_id');

        });
    }


    public function down()
    {
        Schema::table('payments', function(Blueprint $table) {
            $table->dropColumn([
                    'invoice_no',
                    'status',
                    'user_id',
                ]);
        });
    }
}
