<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Exercise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise', function (Blueprint $table) {
            $table->increments('idExercise');
            $table->string('question');
            $table->string('content');
            $table->dateTime('postingTime');
            $table->dateTime('deadlineSubmission');
            $table->boolean('title');
            $table->boolean('status');
            $table->unsignedInteger('idGrade');
            $table->unsignedInteger('idTeacher');
            $table->foreign('idGrade')->references('idGrade')->on('grade');
            $table->foreign('idTeacher')->references('idTeacher')->on('teacher');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exercise');
    }
}
