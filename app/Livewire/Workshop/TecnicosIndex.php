<?php

namespace App\Livewire\Workshop;

use App\Models\Technician;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Auth;

class TecnicosIndex extends Component
{
    use LivewireAlert;
    protected $listeners = ['render' => 'render'];
    public function render()
    {
        $technicians = Auth::user()->workshop->technicians;
        return view('livewire.workshop.tecnicos-index', compact('technicians'));
    }
}
