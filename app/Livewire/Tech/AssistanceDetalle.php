<?php

namespace App\Livewire\Tech;

use App\Models\Assistance;
use App\Notifications\ReporteRecibido;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Notification;

class AssistanceDetalle extends Component
{

    use LivewireAlert;
    public function getListeners()
    {
        return [
            "echo-notification:App.Models.User." . auth()->user()->id . ',MecanicoLLega' => "render", // notif pa el user mecanico ha llegado
            'cargarAsistenciaDetalleParaTecnico'
        ];
    }
    public $assistance_id;
    public $assistance;

    public $title;
    public $ref;

    public $detail;
    public function render()
    {
        return view('livewire.tech.assistance-detalle');
    }

    public function cargarAsistenciaDetalleParaTecnico($id)
    {
        $this->assistance_id = $id;
        $this->assistance = Assistance::find($this->assistance_id);
    }

    public function enviarReporte()
    {
        $task = $this->assistance->tarea;

        $task->title = $this->title;
        $task->ref = $this->ref;
        $task->detail = $this->detail;
        $task->status = 1;
        $task->save();

        $this->alert('success', 'Reporte Enviado', [
            'position' => 'center',
            'showConfirmButton' => true,
            'toast' => false,
            'onConfirmed' => 'confirmed'
        ]);

        // Notificar a la empresa que se recibio su reporte
        Notification::send($task->technician->workshop->user, new ReporteRecibido($task));
    }
}
