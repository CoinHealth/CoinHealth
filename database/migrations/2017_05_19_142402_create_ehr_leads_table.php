<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEhrLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ehr_leads', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('provider_id');
            $table->text('reason');
            $table->dateTime('date');
            $table->boolean('is_assist')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ehr_leads');
    }
}
