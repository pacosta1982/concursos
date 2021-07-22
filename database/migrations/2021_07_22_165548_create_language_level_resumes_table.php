<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageLevelResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_level_resumes', function (Blueprint $table) {
            $table->id();
            $table->Integer('resume_id')->unsigned();
            $table->foreign('resume_id')->references('id')->on('resumes');
            $table->Integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('languages');
            $table->Integer('language_level_id')->unsigned();
            $table->foreign('language_level_id')->references('id')->on('language_levels');
            $table->boolean('certificate');
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
        Schema::dropIfExists('language_level_resumes');
    }
}
