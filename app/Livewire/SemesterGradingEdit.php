<?php

namespace App\Livewire;
use Livewire\Attributes\On;
use Livewire\Component;
use Flux\Flux;
use App\Models\SemesterGrading;

class SemesterGradingEdit extends Component
{
    public $id, $grading_codes, $grading_description;

    public function render()
    {
        return view('livewire.semester-grading-edit');
    }

    #[On("editPost")]
    public function editPost($id){
        $post = SemesterGrading::find($id);
        $this->id = $id;
        $this->grading_codes = $post->grading_codes;
        $this->grading_description = $post->grading_description;

        Flux::modal("edit-post")->show();
    }

    public function update(){
        $this->validate([
            "grading_codes" => "required",
            "grading_description" => "required"
        ]);

        $post = SemesterGrading::find($this->id);
        $post->grading_codes = $this->grading_codes;
        $post->grading_description = $this->grading_description;

        $post->save();

        Flux::modal("edit-post")->close();
        $this->dispatch("reloadPosts");
    }

}
