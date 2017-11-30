<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsOnPatientLaboratoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_laboratories', function(Blueprint $table) {
            $table->string('procedure')->after('patient_id');
            $table->date('date')->after('procedure');
            $table->string('where')->after('date');
            $table->string('facility')->after('where');
            $table->string('how_often')->after('facility');
            $table->text('result')->nullable()->after('how_often');
            $table->text('comments')->nullable()->after('result');
            $table->integer('uploaded_by')->after('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_laboratories', function(Blueprint $table) {
            $table->dropColumn([
                'procedure',
                'date',
                'where',
                'facility',
                'how_often',
                'result',
                'comments',
                'uploaded_by',
            ]);
        });
    }
}
