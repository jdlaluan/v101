<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseGrading extends Model
{
    protected $table = 'course_grade';
    protected $fillable = ["course_code", "course_name"];
}
