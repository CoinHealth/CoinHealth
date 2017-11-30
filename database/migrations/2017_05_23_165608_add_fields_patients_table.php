<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function(Blueprint $table) {
            $table->string('contact_home', 20)->after('race')->nullable();
            $table->string('contact_cell', 20)->after('contact_home')->nullable();
            $table->string('contact_work', 20)->after('contact_cell')->nullable();
            $table->string('emergency_contact_person', 100)->after('contact_work')->nullable();
            $table->string('emergency_contact_relation', 100)->after('emergency_contact_person')->nullable();
            $table->string('emergency_contact_no', 100)->after('emergency_contact_relation')->nullable();
            $table->string('patient_notes')->after('emergency_contact_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function(Blueprint $table) {
            $table->dropColumn([
                'contact_home',
                'contact_cell',
                'contact_work',
                'emergency_contact_person',
                'emergency_contact_relation',
                'emergency_contact_no',
                'patient_notes'
            ]);
        });
    }
}
