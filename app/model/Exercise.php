<?php

namespace App\model;

use app\model\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    
    protected $table = 'exercise';
    public $primaryKey = 'idExercise';
    public $timestamps = false;
}
