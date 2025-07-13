<?php

// namespace App\Livewire;

// use Livewire\Component;


// namespace App\Livewire;

// use Livewire\Component;
// use App\Models\User;
// use App\Models\CourseGrading;
// use App\Models\StudentsTakingEnrollment;
// use App\Enums\UserRole;
// use Illuminate\Support\Facades\Auth;

// class EnrollUser extends Component
// {
//     public $studentId;
//     public $name = '';
//     public $course = '';
//     public $agency = '';
//     public $faculty = '';

//     // Arrays to hold dropdown options
//     public $courses = [];
//     public $agencies = [];
//     public $faculties = [];

//     public function mount()
//     {
//         // Get the currently authenticated user
//         $user = Auth::user();

//         // Verify this is a student (using 'user' role as per your enum)
//         if ($user->role !== UserRole::User) {
//             abort(403, 'Only students can enroll');
//         }

//         $this->studentId = $user->id;
//         $this->name = $user->name;

//         // Load dropdown options
//         $this->loadDropdownOptions();
//     }

//     protected function loadDropdownOptions()
//     {
//         // Load available courses from course_grade table
//         $this->courses = CourseGrading::all()
//             ->mapWithKeys(function ($course) {
//                 return [$course->id => "{$course->course_code} - {$course->course_name}"];
//             })
//             ->toArray();

//         // Load cooperating agencies (users with agency role)
//         $this->agencies = User::where('role', UserRole::Agency)
//             ->get()
//             ->mapWithKeys(function ($user) {
//                 return [$user->id => $user->name];
//             })
//             ->toArray();

//         // Load faculties (users with faculty role)
//         $this->faculties = User::where('role', UserRole::Faculty)
//             ->get()
//             ->mapWithKeys(function ($user) {
//                 return [$user->id => $user->name];
//             })
//             ->toArray();
//     }

//     public function submit()
//     {
//         $this->validate([
//             'studentId' => 'required|exists:users,id',
//             'course' => 'required|exists:course_grade,id',
//             'agency' => [
//                 'required',
//                 'exists:users,id',
//                 function ($attribute, $value, $fail) {
//                     $user = User::find($value);
//                     if (!$user || $user->role !== UserRole::Agency) {
//                         $fail('The selected agency is invalid.');
//                     }
//                 }
//             ],
//             'faculty' => [
//                 'required',
//                 'exists:users,id',
//                 function ($attribute, $value, $fail) {
//                     $user = User::find($value);
//                     if (!$user || $user->role !== UserRole::Faculty) {
//                         $fail('The selected faculty is invalid.');
//                     }
//                 }
//             ],
//         ]);

//         try {
//             // Create the enrollment record
//             StudentsTakingEnrollment::create([
//                 'user_id' => $this->studentId,
//                 'full_name' => $this->name,
//                 'course_grade_id' => $this->course,
//                 'agency_id' => $this->agency,
//                 'faculty_id' => $this->faculty,
//                 // enrollment_date will be automatically set by MySQL
//             ]);

//             // Show success message
//             session()->flash('success', 'Enrollment submitted successfully!');

//             // Reset form fields
//             $this->reset(['course', 'agency', 'faculty']);

//             // Close the modal
//             $this->dispatch('close-modal', 'create-post');

//             // Optionally emit an event to refresh parent components
//             $this->dispatch('enrollment-created');

//         } catch (\Exception $e) {
//             session()->flash('error', 'Failed to submit enrollment: ' . $e->getMessage());
//         }
//     }

//     public function render()
//     {
//         return view('livewire.enroll-user');
//     }
// }





namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\CourseGrading;
use App\Models\StudentsTakingEnrollment;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

class AdminViewEnrolledStuds extends Component
{
    public $studentId;
    public $name = '';
    public $course = '';
    public $agency = '';
    public $faculty = '';

    public $courses = [];
    public $agencies = [];
    public $faculties = [];

    public $enrollments = []; // Added for displaying enrolled students

    public function mount()
    {
        $user = Auth::user();

        // if ($user->role !== UserRole::User) {
        //     abort(403, 'Only students can enroll');
        // }

        $this->studentId = $user->id;
        $this->name = $user->name;

        $this->loadDropdownOptions();
        $this->loadEnrollments(); // Load existing enrollments
    }

    protected function loadDropdownOptions()
    {
        $this->courses = CourseGrading::all()
            ->mapWithKeys(fn ($course) => [
                $course->id => "{$course->course_code} - {$course->course_name}"
            ])->toArray();

        $this->agencies = User::where('role', UserRole::Agency)
            ->get()
            ->mapWithKeys(fn ($user) => [$user->id => $user->name])
            ->toArray();

        $this->faculties = User::where('role', UserRole::Faculty)
            ->get()
            ->mapWithKeys(fn ($user) => [$user->id => $user->name])
            ->toArray();
    }

    protected function loadEnrollments()
    {
        $this->enrollments = StudentsTakingEnrollment::with([
            'student',
            'course',
            'agency',
            'faculty'
        ])->latest()->get();
    }

    public function submit()
    {
        $this->validate([
            'studentId' => 'required|exists:users,id',
            'course' => 'required|exists:course_grade,id',
            'agency' => [
                'required',
                'exists:users,id',
                function ($attr, $value, $fail) {
                    $user = User::find($value);
                    if (!$user || $user->role !== UserRole::Agency) {
                        $fail('Invalid agency selected');
                    }
                }
            ],
            'faculty' => [
                'required',
                'exists:users,id',
                function ($attr, $value, $fail) {
                    $user = User::find($value);
                    if (!$user || $user->role !== UserRole::Faculty) {
                        $fail('Invalid faculty selected');
                    }
                }
            ],
        ]);

        try {
            StudentsTakingEnrollment::create([
                'user_id' => $this->studentId,
                'full_name' => $this->name,
                'course_grade_id' => $this->course,
                'agency_id' => $this->agency,
                'faculty_id' => $this->faculty,
            ]);

            $this->loadEnrollments(); // Refresh the enrollment list
            $this->reset(['course', 'agency', 'faculty']);

            session()->flash('success', 'Enrollment submitted successfully!');

            // Close the modal after successful submission
            $this->dispatch('close-modal', 'create-post');

        } catch (\Exception $e) {
            session()->flash('error', 'Failed to submit enrollment: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin-view-enrolled-studs');
    }
}
