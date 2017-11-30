<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditConditionSymptomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('condition_symptom', function (Blueprint $table) {
            $table->string('symptom_id', 20)->change();
            $table->string('condition_id', 20)->change();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('condition_symptom', function (Blueprint $table) {
            $table->integer('symptom_id')->change();
            $table->integer('condition_id')->change();
        });
    }
}
