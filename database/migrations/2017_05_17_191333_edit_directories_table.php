<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directories', function(Blueprint $table) {
            $table->dropColumn('provider_id');
            $table->morphs('saveable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directories', function(Blueprint $table) {
            $table->dropColumn('saveable_id');
            $table->dropColumn('saveable_type');
            $table->integer('provider_id');
        });
    }
}
