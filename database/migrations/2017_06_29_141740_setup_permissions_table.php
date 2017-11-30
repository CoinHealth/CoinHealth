<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_permissions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned(); // users table
            $table->integer('provider_id')->unsigned(); // users table
            $table->timestamps();

            $table->foreign('patient_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('provider_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

        //
        Schema::create('permissibles', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_id')->unsigned();
            $table->morphs('permissible');
            $table->date('expired_at'); // revoked
            $table->boolean('is_accepted')->default(false);
            $table->boolean('is_revoked')->default(false);
            $table->timestamps();

            $table->foreign('permission_id')
                ->references('id')->on('patient_permissions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_permissions', function(Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropForeign(['provider_id']);
        });
        Schema::table('permissibles', function(Blueprint $table) {
            $table->dropForeign(['permission_id']);
        });

        Schema::drop('patient_permissions');
        Schema::drop('permissibles');
    }
}
