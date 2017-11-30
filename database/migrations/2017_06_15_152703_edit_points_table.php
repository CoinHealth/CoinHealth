<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditPointsTable extends Migration
{
    
    public function up()
    {
        Schema::table('points', function(Blueprint $table) {
            $table->dropColumn([
                'type',
                'description',
            ]);
            $table->integer('user_id')->after('id');
            $table->integer('gamification_id')->after('user_id');
        });
    }

    public function down()
    {
        Schema::table('points', function(Blueprint $table) {
            $table->dropColumn([
                'user_id',
                'gamification_id',
            ]);
            $table->integer('type')->after('from_url');
            $table->integer('description')->after('type');
        });
    }
}
