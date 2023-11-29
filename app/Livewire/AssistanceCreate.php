<?php

namespace App\Livewire;

use Livewire\Component;

class AssistanceCreate extends Component
{

    public $title;
    public $description;
    public $vehicle;

    public function render()
    {
        return view('livewire.assistance-create');
    }

    public function create(){
        
    }
}
