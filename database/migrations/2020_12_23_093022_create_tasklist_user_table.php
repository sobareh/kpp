<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasklistUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('priority');
            $table->timestamps();
            $table->timestamp('process_at')->nullable();
            $table->timestamp('done_at')->nullable();

            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasklist_user');
    }
}
