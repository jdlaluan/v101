<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CourseGrading;
use App\Models\StudentsTakingEnrollment;
use Livewire\Attributes\On;

class FacultyMasterListShow extends Component
{
    public $courses = [];
    public $selectedCourseId = null;
    public $enrolledStudents = [];
    public $showStudentModal = false;

    public function mount()
    {
        $this->loadCourses();
    }

    #[On('enrollment-created')]
    public function loadCourses()
    {
        $this->courses = CourseGrading::all()->map(function ($course) {
            return [
                'id' => $course->id,
                'code' => $course->course_code,
                'name' => $course->course_name,
                'count' => StudentsTakingEnrollment::where('course_grade_id', $course->id)->count()
            ];
        });
    }

    public function viewStudents($courseId)
    {
        $this->selectedCourseId = $courseId;
        $this->enrolledStudents = StudentsTakingEnrollment::with(['student', 'agency', 'faculty'])
            ->where('course_grade_id', $courseId)
            ->get();
        $this->showStudentModal = true;
    }

    public function closeModal()
    {
        $this->showStudentModal = false;
        $this->selectedCourseId = null;
        $this->enrolledStudents = [];
    }

    public function render()
    {
        return view('livewire.faculty-master-list-show');
    }
}
