<?php

// namespace App\Livewire;

// use Livewire\Component;

// class DashboardShowCount extends Component
// {
//     public function render()
//     {
//         return view('livewire.dashboard-show-count');
//     }
// }

namespace App\Livewire;
use App\Enums\UserRole;
use Livewire\Component;
use App\Models\User; // Import the User model
use App\Models\CourseGrading; // Import the CourseGrading model for 'Courses'

class DashboardShowCount extends Component
{
    public $studentCount;
    public $agencyCount;
    public $facultyCount;
    public $courseCount;

    // public function mount()
    // {
    //     $this->studentCount = User::count();
    //     $this->agencyCount = User::count();
    //     $this->facultyCount = User::count();
    //     $this->courseCount = CourseGrading::count();
    //     $this->userCount = User::count(); // Get total user count
    // }


    public function mount(){
        $this->facultyCount = User::where('role', UserRole::Faculty)->count();
        $this->agencyCount = User::where('role', UserRole::Agency)->count();
        $this->studentCount = User::where('role', UserRole::User)->count();
        $this->courseCount = CourseGrading::count();
    }



    public function render()
    {
        return view('livewire.dashboard-show-count');
    }
}
