<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentsTakingEnrollment; // Your enrollment table model
use App\Models\SemesterGrading;



class AgencyDashboardCounts extends Component
{
    public $studentCount = 0;
    public $semesterCount = 0;


    public function mount()
    {
        // Get the current logged-in agency's ID
        $agencyId = Auth::id();

        // Count students who selected this agency as their target
        $this->studentCount = StudentsTakingEnrollment::where('agency_id', $agencyId)
                                                   ->distinct('user_id')
                                                   ->count('user_id');

        // Count available semesters
        $this->semesterCount = SemesterGrading::count();
    }

    public function render()
    {
        return view('livewire.agency-dashboard-counts');
    }
}
