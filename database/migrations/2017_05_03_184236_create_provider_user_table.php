<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderUserTable extends Migration
{
    public function up()
    {
        Schema::create('provider_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('provider_user');
    }
}
