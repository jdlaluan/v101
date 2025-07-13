<?php

namespace App\Livewire;
use App\Enums\UserRole;
use Livewire\Component;
use App\Models\User; // Import the User model
use App\Models\CourseGrading; // Import the CourseGrading model for 'Courses'
use App\Models\StudentSubmittedTask; // Import the Course model for 'Courses'

class FacultyShowCount extends Component
{
    //public $courseCount;
    public $studentCount, $submittedStudentsCount;

    public function mount(){

        $facultyId = auth()->id();

        $this->studentCount = User::where('role', UserRole::User)->count();
        //$this->courseCount = CourseGrading::count();

        // Count unique students who submitted tasks to this faculty
        $this->submittedStudentsCount = StudentSubmittedTask::whereHas('task', function($query) use ($facultyId) {
            $query->where('faculty_id', $facultyId);
        })->distinct('student_id')->count('student_id');

    }

    public function render()
    {
        return view('livewire.faculty-show-count');
    }
}
