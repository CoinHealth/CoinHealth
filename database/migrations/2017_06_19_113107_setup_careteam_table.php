<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupCareteamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function(Blueprint $table) {
            $table->uuid('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->smallInteger('chat_type')->default(1); // 1 = CareTeam, 2 = Public
            $table->timestamps();
        });

        Schema::create('chat_user', function(Blueprint $table) {
            $table->increments('id');
            $table->uuid('chat_id');
            $table->integer('user_id')->unsigned();
            $table->boolean('has_joined')->default(true);
            $table->timestamps();
        });

        Schema::create('chat_replies', function(Blueprint $table) {
            $table->increments('id');
            $table->uuid('chat_id');
            $table->integer('user_id')->unsigned();
            $table->string('message');
            $table->boolean('has_attachments')->default(false);
            $table->datetime('read_at');
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
        Schema::drop('chats');
        Schema::drop('chat_user');
        Schema::drop('chat_replies');
    }
}
