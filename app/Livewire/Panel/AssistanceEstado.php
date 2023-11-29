<?php

namespace App\Livewire\Panel;

use App\Models\Assistance;
use Livewire\Component;

class AssistanceEstado extends Component
{
    public $id;

    public function getListeners()
    {
        return [
            "echo-notification:App.Models.User." . auth()->user()->id . ',MecanicoAsignado' => "render", // evento de mecanico asignado
            "echo-notification:App.Models.User." . auth()->user()->id . ',MecanicoLLega' => "render", // notif pa el user mecanico ha llegado

        ];

    }
    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        $assistance = Assistance::find($this->id);

        return view('livewire.panel.assistance-estado', compact('assistance'));
    }
}
