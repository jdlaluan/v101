<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SemesterGrading extends Model
{
    protected $table = 'semester_grading';
    protected $fillable = ["grading_codes", "grading_description"];
}
