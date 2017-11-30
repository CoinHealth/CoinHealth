<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTaggableMorphOnRecordsTable extends Migration
{
     public function up()
    {
        Schema::table('records', function(Blueprint $table) {
           $table->nullableMorphs('taggable');
        });
    }

    public function down()
    {
        Schema::table('records', function(Blueprint $table) {
            $table->dropColumn([
                    'taggable_id',
                    'taggable_type',
                ]);
        });
    }
}
