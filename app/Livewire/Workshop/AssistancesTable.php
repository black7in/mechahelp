<?php

namespace App\Livewire\Workshop;

use Livewire\Component;

class AssistancesTable extends Component
{

    public function getListeners()
    {
        return [
            "echo-notification:App.Models.User." . auth()->user()->id . ',NuevaSolicitud' => "render", //Evento de nueva solicitud
            "echo-notification:App.Models.User." . auth()->user()->id . ',RespuestaAceptada' => "render", // Eevento de respeusta aceptada
            "echo-notification:App.Models.User." . auth()->user()->id . ',MecanicoAsignado' => "render", // evento de mecanico asignado
            "echo-notification:App.Models.User." . auth()->user()->id . ',MecanicoLLega' => "render", // evento de mecanico asignado
        ];

    }
    public function render()
    {
        $assistances = auth()->user()->workshop->assistances;
        return view('livewire.workshop.assistances-table', compact('assistances'));
    }

    public function emitirAsistencia($id)
    {
        $this->dispatch('cargarAsistencia', $id);
    }

}
