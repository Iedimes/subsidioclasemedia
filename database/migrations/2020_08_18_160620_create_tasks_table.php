<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NroExp');
            $table->string('name');
            $table->string('last_name');
            $table->string('government_id');
            $table->string('state_id');
            $table->string('city_id');
            $table->string('farm');
            $table->string('account');
            $table->integer('amount');
            $table->bigInteger('workflow_id')->unsigned();
            $table->foreign('workflow_id')->references('id')->on('workflows')->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
}
