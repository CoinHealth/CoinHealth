<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('records', function(Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('user_id');
            $table->integer('subscriber_id');
            $table->morphs('recordable');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
