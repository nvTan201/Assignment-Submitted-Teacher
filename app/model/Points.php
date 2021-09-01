<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    protected $table = 'exercise_finish';

    public $timestamps = false;
    public $primaryKey = 'idExerciseFinish';
}
