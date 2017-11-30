<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientFamilyHistoriesTable extends Migration
{
    
    public function up()
    {
        Schema::create('patient_family_histories', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->text('high_blood')->nullable();
            $table->text('heart_attack')->nullable();
            $table->text('stroke')->nullable();
            $table->text('blood_clots')->nullable();
            $table->text('bleeding_tendency')->nullable();
            $table->text('glaucoma')->nullable();
            $table->text('osteoporosis')->nullable();
            $table->text('hip_fracture')->nullable();
            $table->text('diabetes')->nullable();
            $table->text('breast_cancer')->nullable();
            $table->text('colorectal_cancer')->nullable();
            $table->text('ovarian_cancer')->nullable();
            $table->text('other_type_of_cancer')->nullable();
            $table->text('depression')->nullable();
            $table->text('other_emotional_problems')->nullable();
            $table->text('alzheimer_disease')->nullable();
            $table->text('violence_victim')->nullable();
            $table->text('violence_person')->nullable();
            $table->text('sexual_abuse_victim')->nullable();
            $table->text('sexual_abuse_person')->nullable();
            $table->text('alcoholism')->nullable();
            $table->text('drug_abuse')->nullable();
            $table->text('other_concern')->nullable();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('patient_family_histories');
    }
}
