<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\StudentsTakingEnrollment;
use Illuminate\Support\Facades\Auth;

class ViewAgencyRating extends Component
{
    public $faculties = [];

    public function mount()
    {
        $this->loadFaculties();
    }

    public function loadFaculties()
    {
        $agencyId = Auth::id(); // Get current agency user's ID

        $this->faculties = StudentsTakingEnrollment::with('faculty')
            ->where('agency_id', $agencyId)
            ->get()
            ->unique('faculty_id') // Get unique faculty entries
            ->map(function ($enrollment) {
                return [
                    'id' => $enrollment->faculty_id,
                    'name' => $enrollment->faculty->name,
                    'rating' => null // You can add actual rating logic later
                ];
            });
    }

    public function render()
    {
        return view('livewire.view-agency-rating');
    }
}
