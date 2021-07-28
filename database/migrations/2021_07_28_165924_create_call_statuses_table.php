<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_statuses', function (Blueprint $table) {
            $table->id();
            $table->Integer('call_id')->unsigned();
            $table->foreign('call_id')->references('id')->on('calls');
            $table->Integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->string('user');
            $table->string('user_model');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('call_statuses');
    }
}
