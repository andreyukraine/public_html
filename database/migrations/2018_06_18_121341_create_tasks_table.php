<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title');
            $table->string('task_manager');
            $table->string('descriptions');
            $table->string('status');
            $table->string('user_task');
            $table->string('slug');
            $table->timestamps();
//            $table->integer('category_id')->unsigned()->index()->nullable();
//            $table->foreign('category_id')->references('id')->on('categories');
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
