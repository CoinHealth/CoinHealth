<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facilitator');
            $table->string('facilitator_degrees');
            $table->string('name');
            $table->string('description');
            $table->string('location');
            $table->string('host', 50);
            $table->string('contact_number', 20);
            $table->text('issues');
            $table->text('mental_health');
            $table->string('sexuality', 10);
            $table->string('treatment_orientation', 100);
            $table->string('age_bracket', 100);
            $table->string('session_cost', 40);
            $table->string('group_schedule');
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
        Schema::dropIfExists('support_groups');
    }
}
