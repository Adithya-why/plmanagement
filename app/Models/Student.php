<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';


    //for mass assignment
    protected $fillable = [
        'deptno',
        'name',
        'department',
        'cgpa',
    ];
}
