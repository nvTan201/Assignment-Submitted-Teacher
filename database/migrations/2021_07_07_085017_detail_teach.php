<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailTeach extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailTeach', function (Blueprint $table) {
            $table->integer("idTeacher")->unsigned();
            $table->integer("idGrade")->unsigned();
            $table->primary(['idTeacher', 'idGrade']);
            $table->foreign('idTeacher')->references('idTeacher')->on('teacher');
            $table->foreign('idGrade')->references('idGrade')->on('grade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detailTeach');
    }
}
