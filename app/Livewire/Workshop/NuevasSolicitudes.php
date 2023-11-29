<?php

namespace App\Livewire\Workshop;

use App\Models\Assistance;
use Livewire\Component;

class NuevasSolicitudes extends Component
{
    public function render()
    {
        $assistances = Assistance::where('status', 0)->get();

        return view('livewire.workshop.nuevas-solicitudes', compact('assistances'));
    }
}
