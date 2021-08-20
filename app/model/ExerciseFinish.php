<?php

namespace App\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseFinish extends Model
{
   
    protected $table = 'exercise_finish';
    public $primaryKey = 'idExerciseFinish';
    public $timestamps = false;
}
