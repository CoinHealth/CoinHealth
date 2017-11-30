<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHasPermissionOnChatRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chat_replies', function(Blueprint $table) {
            $table->boolean('has_permission')
                    ->after('has_attachments')
                    ->default(false);
            $table->text('permission')
                ->after('has_permission')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chat_replies', function(Blueprint $table) {
            $table->dropColumn(['has_permission', 'permission']);
        });
    }
}
