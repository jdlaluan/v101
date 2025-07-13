<?php

use App\Models\User;
use Flux\Flux;
use Livewire\Component;

class AgencyCreate extends Component
{
    public $name, $email;

    public function render()
    {
        return view('livewire.agency-create');
    }
    public function submit(){
        $this->validate([
            "name"=> "required",
            "email"=> "required"
        ]);

        User::create([
            "name" => $this->name,
            "email" => $this->email
        ]);

        $this->resetForm();

        Flux::modal("create-post")->close();

        $this->dispatch("reloadPosts");
    }

    public function resetForm(){
        $this->name = "";
        $this->email = "";
    }
}
