<?php

namespace App\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    protected $table = 'student';
    protected $fillable = [
        'fistNameStudent', 'lastNameStudent', 'dateBirth', 'gender',
        'emailStudent', 'passWordStudent', 'statusStudent', 'idGrade'
    ];
    public $primaryKey = 'idStudent';
    public $timestamps = false;
}
