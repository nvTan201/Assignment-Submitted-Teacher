<?php

namespace App\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    
    protected $table = "teacher";
    protected $fillable = [
        'fistNameTeacher', 'lastNameTeacher', 'emailTeacher', 'passWordTeacher',
        'statusTeacher'
    ];
    public $primaryKey = "idTeacher";
    public $timestamps = false;
}
