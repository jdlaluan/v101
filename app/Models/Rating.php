<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings_faculty_tostudents';

    protected $fillable = [
        'faculty_id',
        'student_id',
        'task_id',
        'submission_id',
        'score',
        'comments'
    ];

    public function faculty()
    {
        return $this->belongsTo(User::class, 'faculty_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function task()
    {
        return $this->belongsTo(FacultyTaskInfo::class, 'task_id');
    }

    public function submission()
    {
        return $this->belongsTo(StudentSubmittedTask::class, 'submission_id');
    }
}
