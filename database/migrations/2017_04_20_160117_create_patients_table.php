<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned(); // assign to registered user
            $table->string('name')->nullable();
            $table->string('avatar');
            $table->string('email', 150)->nullable();
            $table->string('gender', 50)->nullable();
            $table->timestamp('dob')->nullable();
            $table->text('address')->nullable(); // json
            $table->string('ssn')->nullable();
            $table->text('language')->nullable(); // array
            $table->string('ethnicity')->nullable();
            $table->string('race')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
