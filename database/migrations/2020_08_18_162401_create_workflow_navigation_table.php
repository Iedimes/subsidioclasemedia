<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkflowNavigationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflow_navigation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('workflow_state_id')->unsigned();
            $table->foreign('workflow_state_id')->references('id')->on('workflow_states')->onDelete('cascade');
            $table->bigInteger('next_workflow_state_id')->unsigned();
            $table->foreign('next_workflow_state_id')->references('id')->on('workflow_states')->onDelete('cascade');
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
        Schema::dropIfExists('workflow_navigation');
    }
}
