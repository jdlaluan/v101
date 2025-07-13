<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\StudentsTakingEnrollment;
use App\Models\SemesterGrading;
use App\Models\FacultyTaskInfo;
use Livewire\Attributes\On;

use App\Models\StudentSubmittedTask;
use App\Models\Rating;


class FacultyTaskInfoList extends Component
{
    public $students = [];
    public $showTaskModal = false;
    public $gradingOptions = [];

    // Task form fields
    public $task_name = '';
    public $task_description = '';
    public $deadline = '';
    public $grading_code_id = '';
    public $selectedStudentId = null;

    public function mount()
    {
        $this->loadStudents();
        $this->gradingOptions = SemesterGrading::all();
    }

    public function loadStudents()
    {
        $facultyId = auth()->id();
        $this->students = StudentsTakingEnrollment::with(['student', 'course'])
            ->where('faculty_id', $facultyId)
            ->get()
            ->map(function ($enrollment) {
                return [
                    'id' => $enrollment->student->id,
                    'name' => $enrollment->student->name,
                    'course_code' => $enrollment->course->course_code,
                    'course_name' => $enrollment->course->course_name,
                    'tasks_count' => FacultyTaskInfo::where('student_id', $enrollment->student->id)->count()
                ];
            });
    }

    public function showAddTaskModal($studentId)
    {
        $this->selectedStudentId = $studentId;
        $this->showTaskModal = true;
    }

    public function addTask()
    {
        $this->validate([
            'task_name' => 'required|string|max:255',
            'task_description' => 'required|string',
            'deadline' => 'required|date',
            'grading_code_id' => 'required|exists:semester_grading,id',
        ]);

        FacultyTaskInfo::create([
            'faculty_id' => auth()->id(),
            'student_id' => $this->selectedStudentId,
            'task_name' => $this->task_name,
            'task_description' => $this->task_description,
            'deadline' => $this->deadline,
            'grading_code_id' => $this->grading_code_id,
        ]);

        $this->resetForm();
        $this->showTaskModal = false;
        $this->loadStudents();
    }

    public function resetForm()
    {
        $this->task_name = '';
        $this->task_description = '';
        $this->deadline = '';
        $this->grading_code_id = '';
        $this->selectedStudentId = null;
    }

    public function render()
    {
        return view('livewire.faculty-task-info-list');
    }
}
