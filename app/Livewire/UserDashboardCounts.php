<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FacultyTaskInfo;
use App\Models\StudentSubmittedTask;
use Illuminate\Support\Facades\Auth;

class UserDashboardCounts extends Component
{
    public $totalTasksGiven;
    public $submittedTasksCount;
    public $pendingTasksCount;

    public function mount()
    {
        $studentId = Auth::id(); // Get current logged-in student ID

        // Count all tasks assigned to this student by any faculty
        $this->totalTasksGiven = FacultyTaskInfo::where('student_id', $studentId)->count();

        // Count tasks this student has submitted
        $this->submittedTasksCount = StudentSubmittedTask::where('student_id', $studentId)->count();

        // Calculate pending tasks (assigned but not submitted)
        $this->pendingTasksCount = $this->totalTasksGiven - $this->submittedTasksCount;
    }

    public function render()
    {
        return view('livewire.user-dashboard-counts');
    }
}
