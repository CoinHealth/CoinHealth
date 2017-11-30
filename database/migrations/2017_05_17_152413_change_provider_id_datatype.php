<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProviderIdDatatype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directories', function(Blueprint $table) {
            $table->string('provider_id', 20)->change();
        });

        Schema::table('provider_user', function(Blueprint $table) {
            $table->string('provider_id', 20)->change();
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
            $table->integer('provider_id')->change();
        });

        Schema::table('provider_user', function(Blueprint $table) {
            $table->integer('provider_id')->change();
        });
    }
}
