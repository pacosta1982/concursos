<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->Integer('position_id')->unsigned();
            $table->foreign('position_id')->references('id')->on('position');
            $table->Integer('requirement_type_id')->unsigned();
            $table->foreign('requirement_type_id')->references('id')->on('requirement_types');
            $table->Integer('education_level_id')->unsigned();
            $table->foreign('education_level_id')->references('id')->on('education_levels');
            $table->string('name');
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
        Schema::dropIfExists('requirements');
    }
}
