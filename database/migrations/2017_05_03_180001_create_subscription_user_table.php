<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionUserTable extends Migration
{
   
    public function up()
    {
        Schema::create('subscription_user', function (Blueprint $table) {
            $table->integer('subscription_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subscription_id')->references('id')->on('subscriptions')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'subscription_id']);
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('subscription_user');
    }
}
