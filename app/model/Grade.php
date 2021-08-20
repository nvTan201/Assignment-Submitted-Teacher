<?php

namespace App\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    
    protected $table = 'grade';
    protected $fillable = ['nameGrade', 'course'];
    public $primaryKey = 'idGrade';
    public $timestamps = false;
}
