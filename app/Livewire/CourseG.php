<?php

namespace App\Livewire;
use App\Models\CourseGrading;
use Livewire\Component;
use Livewire\Attributes\On;
use Flux\Flux;

class CourseG extends Component
{
    public $posts, $holdId;

    public function mount(){
        $this->posts = CourseGrading::all();
    }

    public function render()
    {
        return view('livewire.course-g');
    }

    #[On("reloadPosts")]
    public function reloadPosts(){
        $this->posts = CourseGrading::all();
    }

    public function edit($id){
        $this->dispatch("editPost", $id);
    }

    public function delete($id){
        $this->holdId = $id;
        Flux::modal("delete-post")->show();
    }

    public function destroy(){
        CourseGrading::find($this->holdId)->delete();
        $this->reloadPosts();
        Flux::modal("delete-post")->close();
    }
}
