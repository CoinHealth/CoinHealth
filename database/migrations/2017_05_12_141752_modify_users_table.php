<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class ModifyUsersTable extends Migration
{
   
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->renameColumn('fname', 'first_name');
            $table->string('middle_name')->after('fname');
            $table->renameColumn('lname', 'last_name');
            $table->string('gender')->after('lname');
            $table->datetime('dob')->after('gender');
            $table->text('contact')->after('email');
            $table->text('address')->after('contact');
            $table->renameColumn('purpose', 'role');
            $table->dropColumn([
                'avatar',
                'location_id',
            ]);

        });
    }

    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn([
                'middle_name',
                'gender',
                'dob',
                'contact',
                'address',
            ]);
            $table->renameColumn('first_name', 'fname');
            $table->renameColumn('last_name', 'lname');
            $table->renameColumn('role', 'purpose');
            $table->string('avatar')->after('email');
            $table->integer('location_id')->after('display_name');
        });
    }
}
