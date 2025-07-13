<?php

namespace App\Livewire;

use App\Models\CourseGrading;
use Flux\Flux;
use Livewire\Component;

class CourseCreate extends Component
{
    public $course_code, $course_name;

    public function render()
    {
        return view('livewire.course-create');
    }

    public function submit(){
        $this->validate([
            "course_code"=> "required",
            "course_name"=> "required"
        ]);

        CourseGrading::create([
            "course_code" => $this->course_code,
            "course_name" => $this->course_name
        ]);

        $this->resetForm();

        Flux::modal("create-post")->close();

        $this->dispatch("reloadPosts");
    }

    public function resetForm(){
        $this->course_code = "";
        $this->course_name = "";
    }
}
