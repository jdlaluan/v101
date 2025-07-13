<?php

namespace App\Livewire;
use App\Models\SemesterGrading;
use Livewire\Component;
use Livewire\Attributes\On;
use Flux\Flux;

class SemesterG extends Component
{
    public $posts, $holdId;

    public function mount(){
        $this->posts = SemesterGrading::all();
    }

    public function render()
    {
        return view('livewire.semester-g');
    }

    #[On("reloadPosts")]
    public function reloadPosts(){
        $this->posts = SemesterGrading::all();
    }

    public function edit($id){
        $this->dispatch("editPost", $id);
    }

    public function delete($id){
        $this->holdId = $id;
        Flux::modal("delete-post")->show();
    }

    public function destroy(){
        SemesterGrading::find($this->holdId)->delete();
        $this->reloadPosts();
        Flux::modal("delete-post")->close();
    }
}

