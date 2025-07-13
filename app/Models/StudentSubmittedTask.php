<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSubmittedTask extends Model
{
    protected $table = 'student_submitted_tasks';

    protected $fillable = [
        'task_id',
        'student_id',
        'file_path',
        'comments'
    ];

    public function task()
    {
        return $this->belongsTo(FacultyTaskInfo::class, 'task_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

        // Add this relationship
    public function rating()
    {
        return $this->hasOne(Rating::class, 'submission_id');
    }
}
