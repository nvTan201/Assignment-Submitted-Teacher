<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExerciseFinish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_finish', function (Blueprint $table) {
            $table->increments('idExerciseFinish');
            $table->string('exerciseFinish');
            $table->dateTime('responseTime');
            $table->unsignedInteger('idExercise');
            $table->unsignedInteger('idStudent');
            $table->integer('mark');
            $table->string('note');
            $table->foreign('idExercise')->references('idExercise')->on('exercise');
            $table->foreign('idStudent')->references('idStudent')->on('student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exercise_finish');
    }
}
