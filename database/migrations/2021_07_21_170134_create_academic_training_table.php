<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_training', function (Blueprint $table) {
            $table->id();
            $table->Integer('resume_id')->unsigned();
            $table->foreign('resume_id')->references('id')->on('resumes');
            $table->Integer('education_level_id')->unsigned();
            $table->foreign('education_level_id')->references('id')->on('education_levels');
            $table->Integer('academic_state_id')->unsigned();
            $table->foreign('academic_state_id')->references('id')->on('academic_states');
            $table->string('name');
            $table->string('institution');
            $table->boolean('registered');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_training');
    }
}
