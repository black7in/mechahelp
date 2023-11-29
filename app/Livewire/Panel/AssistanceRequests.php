<?php

namespace App\Livewire\Panel;

use App\Models\Assistance;
use App\Models\Respuesta;
use App\Notifications\RespuestaAceptada;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Notification;

class AssistanceRequests extends Component
{
    use LivewireAlert;
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        $assistance = Assistance::find($this->id);
        $requests = $assistance->respuestas;

        return view('livewire.panel.assistance-requests', compact('requests'));
    }

    public function aceptar($id)
    {
        $respuesta = Respuesta::find($id);

        $assistance = $respuesta->assistance;

        if ($assistance->status > 0) {
            $this->alert('error', 'Este trabajo ya tiene asginado un taller', [
                'position' => 'center',
                'showConfirmButton' => true,
                'toast' => false,
                'onConfirmed' => 'confirmed'
            ]);
            
            return;
        }

        //respuesta aceptada
        $respuesta->status = 1; // respuesta aceptada
        $respuesta->save();


        // taller asignado
        $assistance->workshop_id = $respuesta->workshop_id;
        // asistencia en espera de ser asignado un mecanico
        $assistance->status = 1;
        $assistance->save();

        // Notificar al taller
        $taller = $respuesta->workshop->user;
        Notification::send($taller, new RespuestaAceptada($respuesta));




        $this->alert('success', 'Enviaste tu respuesta! espera al tecnico en el tiempo acordado.', [
            'position' => 'center',
            'showConfirmButton' => true,
            'toast' => false,
            'onConfirmed' => 'confirmed'
        ]);
    }
}
