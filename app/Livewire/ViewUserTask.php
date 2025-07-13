<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\StudentsTakingEnrollment;

class ViewUserTask extends Component
{
    public $enrollments = [];

    public function mount()
    {
        $this->loadEnrollments();
    }

    public function loadEnrollments()
    {
        $this->enrollments = StudentsTakingEnrollment::with([
            'student',
            'course',
            'agency',
            'faculty'
        ])->latest()->get();
    }

    public function render()
    {
        return view('livewire.view-user-task');
    }
}
