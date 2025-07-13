<?php

namespace App\Livewire;
use Livewire\Attributes\On;
use Livewire\Component;
use Flux\Flux;
use App\Models\CourseGrading;

class CourseEdit extends Component
{
    public $id, $course_code, $course_name;

    public function render()
    {
        return view('livewire.course-edit');
    }

    #[On("editPost")]
    public function editPost($id){
        $post = CourseGrading::find($id);
        $this->id = $id;
        $this->course_code = $post->course_code;
        $this->course_name = $post->course_name;

        Flux::modal("edit-post")->show();
    }

    public function update(){
        $this->validate([
            "course_code" => "required",
            "course_name" => "required"
        ]);

        $post = CourseGrading::find($this->id);
        $post->course_code = $this->course_code;
        $post->course_name = $this->course_name;

        $post->save();

        Flux::modal("edit-post")->close();
        $this->dispatch("reloadPosts");
    }
}
