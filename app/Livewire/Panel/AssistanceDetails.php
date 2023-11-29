<?php

namespace App\Livewire\Panel;

use App\Models\Assistance;
use Livewire\Component;

class AssistanceDetails extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        $assistance = Assistance::find($this->id);

        return view('livewire.panel.assistance-details', compact('assistance'));
    }
}
