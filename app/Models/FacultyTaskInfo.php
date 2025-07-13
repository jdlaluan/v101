<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyTaskInfo extends Model
{
    protected $fillable = [
        'faculty_id',
        'student_id',
        'grading_code_id',
        'task_name',
        'task_description',
        'deadline'
    ];

    public function faculty()
    {
        return $this->belongsTo(User::class, 'faculty_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function grading()
    {
        return $this->belongsTo(SemesterGrading::class, 'grading_code_id');
    }

        // Add this relationship
    public function submissions()
    {
        return $this->hasMany(StudentSubmittedTask::class, 'task_id');
    }
}
