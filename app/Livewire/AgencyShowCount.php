<?php

namespace App\Livewire;
use App\Enums\UserRole;
use Livewire\Component;
use App\Models\User; // Import the User model
use App\Models\CourseGrading; // Import the CourseGrading model for 'Courses'

class AgencyShowCount extends Component
{
    public $courseCount;
    public $studentCount;

    public function mount(){
        $this->studentCount = User::where('role', UserRole::User)->count();
        $this->courseCount = CourseGrading::count();
    }

    public function render()
    {
        return view('livewire.agency-show-count');
    }
}
