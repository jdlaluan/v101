<?php

namespace App\Livewire;
use Livewire\Attributes\On;
use Livewire\Component;
use Flux\Flux;
use App\Models\User;

class FacultyEdit extends Component
{
    public $id, $name, $email;

    public function render()
    {
        return view('livewire.faculty-edit');
    }


    #[On("editPost")]
    public function editPost($id){
        $post = User::find($id);
        $this->id = $id;
        $this->name = $post->name;
        $this->email = $post->email;

        Flux::modal("edit-post")->show();
    }

    public function update(){
        $this->validate([
            "name" => "required",
            "email" => "required"
        ]);

        $post = User::find($this->id);
        $post->name = $this->name;
        $post->email = $this->email;

        $post->save();

        Flux::modal("edit-post")->close();
        $this->dispatch("reloadPosts");
    }
}
