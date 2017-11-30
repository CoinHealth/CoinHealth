<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{

    public function up()
    {
      Schema::create('providers', function(Blueprint $table) {
        $table->increments('id');
        $table->string('provider_id'); // uniq timestamp
        $table->string('prefix');
        $table->string('name');
        $table->string('physician_first_name');
        $table->string('physician_last_name');
        $table->string('open_appointments');
        $table->text('specialties'); // array
        $table->text('categories'); // array
        $table->text('sub_categories'); // array
        $table->string('phone');
        $table->text('address'); // object
        $table->text('appointment_reasons'); // array
        $table->string('type');
        $table->text('degree'); //
        $table->timestamps();
      });
    }


    public function down()
    {
      Schema::dropIfExists('providers');
    }
}
