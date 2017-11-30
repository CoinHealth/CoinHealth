<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLogsTable extends Migration
{
   
    public function up()
    {
        Schema::create('user_logs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->timestamp('last_logged_on');
        });
    }

    
    public function down()
    {
        Schema::dropIfExist('user_logs');
    }
}
