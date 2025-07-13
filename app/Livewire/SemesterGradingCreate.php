<?php

namespace App\Livewire;

use App\Models\SemesterGrading;
use Flux\Flux;
use Livewire\Component;

class SemesterGradingCreate extends Component
{
    public $grading_codes, $grading_description;

    public function render()
    {
        return view('livewire.semester-grading-create');
    }

    public function submit(){
        $this->validate([
            "grading_codes"=> "required",
            "grading_description"=> "required"
        ]);

        SemesterGrading::create([
            "grading_codes" => $this->grading_codes,
            "grading_description" => $this->grading_description
        ]);

        $this->resetForm();

        Flux::modal("create-post")->close();

        $this->dispatch("reloadPosts");
    }

    public function resetForm(){
        $this->grading_codes = "";
        $this->grading_description = "";
    }

}
