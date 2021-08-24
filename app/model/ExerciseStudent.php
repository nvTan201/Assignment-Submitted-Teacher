<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ExerciseStudent extends Model
{
    protected $table = 'exercise';

    public $timestamps = false;
    public $primaryKey = 'idExercise';
}
