<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisabilityResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disability_resumes', function (Blueprint $table) {
            $table->id();
            $table->Integer('resume_id')->unsigned();
            $table->foreign('resume_id')->references('id')->on('resumes');
            $table->Integer('disability_id')->unsigned();
            $table->foreign('disability_id')->references('id')->on('disabilities');
            $table->string('cause')->nullable();
            $table->integer('percent');
            $table->string('certificate')->nullable();
            $table->date('certificate_date', $precision = 0)->nullable();
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
        Schema::dropIfExists('disability_resumes');
    }
}
