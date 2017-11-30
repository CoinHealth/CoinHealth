<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('payments');
        Schema::create('payments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('patient_id');
            $table->text('fees');
            $table->integer('total_charges');
            $table->integer('total_discounts');
            $table->integer('patient_paid');
            $table->integer('insurance_paid');
            $table->integer('patient_balance_due');
            $table->string('billed_to');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned(); // this could be a company or user
            $table->string('name',100);
            $table->string('type', 20);
            $table->timestamp('payed_at');
            $table->text('insurance_details')->nullable();
            $table->timestamps();
        });
    }
}
