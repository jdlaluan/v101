<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Flux\Flux;
use App\Enums\UserRole;

class FacultyL extends Component
{
    public $posts, $holdId;

    public function mount(){
        $this->posts = User::where('role', UserRole::Faculty)->get();
    }

    public function render()
    {
        return view('livewire.faculty-l');
    }

    #[On("reloadPosts")]
    public function reloadPosts(){
        $this->posts = User::where('role', UserRole::Faculty)->get();
    }

    public function edit($id){
        $this->dispatch("editPost", $id);
    }

    public function delete($id){
        $this->holdId = $id;
        Flux::modal("delete-post")->show();
    }

    public function destroy(){
        User::find($this->holdId)->delete();
        $this->reloadPosts();
        Flux::modal("delete-post")->close();
    }
}
