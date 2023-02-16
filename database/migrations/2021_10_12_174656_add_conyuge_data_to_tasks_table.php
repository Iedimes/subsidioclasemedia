<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConyugeDataToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
            $table->string('name_couple')->nullable();
            $table->string('last_name_couple')->nullable();
            $table->string('government_id_couple')->nullable();
            $table->Integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
            $table->dropColumn('name_couple');
            $table->dropColumn('last_name_couple');
            $table->dropColumn('government_id_couple');
            $table->dropColumn('category_id');
        });
    }
}
