<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CourseGrading;
use App\Models\StudentsTakingEnrollment;
use Livewire\Attributes\On;

class ViewSemesterAgency extends Component
{
    public $courses = [];
    public $selectedCourse = null;
    public $enrollments = [];
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
        $this->selectedCourse = collect($this->courses)->firstWhere('id', $courseId);
        $this->enrollments = StudentsTakingEnrollment::with([
                'student',
                'agency',
                'faculty',
                'course'
            ])
            ->where('course_grade_id', $courseId)
            ->get();
        $this->showStudentModal = true;
    }

    public function closeModal()
    {
        $this->showStudentModal = false;
        $this->selectedCourse = null;
        $this->enrollments = [];
    }

    public function render()
    {
        return view('livewire.view-semester-agency');
    }
}
