<?php

namespace App\Livewire\Workshop;

use App\Models\Assistance;
use App\Models\Tarea;
use App\Models\Technician;
use App\Models\Work;
use App\Notifications\MecanicoAsignado;
use App\Notifications\NuevaTarea;
use App\Notifications\PagoSolicitado;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Notification;

class AssistanceDetalle extends Component
{
    use LivewireAlert;

    public $assistance_id;
    public $assistance;

    public $tecnico;

    public $price = 0;
    protected $listeners = ['cargarAsistencia'];

    public function render()
    {
        //$assistance = Assistance::find($this->id);
        return view('livewire.workshop.assistance-detalle');
    }

    public function solicitarCobro()
    {
        $this->validate([
            'price' => 'required|numeric',
        ]);

        $this->assistance->status = 4;
        $this->assistance->price = $this->price;
        $this->assistance->save();

        // Notificar el pago
        Notification::send($this->assistance->client->user, new PagoSolicitado($this->assistance));
        $this->alert('success', 'Solicitud de pago enviado', [
            'position' => 'center',
            'showConfirmButton' => true,
            'toast' => false,
            'onConfirmed' => 'confirmedss'
        ]);
    }

    public function cargarAsistencia($id)
    {
        $this->assistance_id = $id;
        $this->assistance = Assistance::find($this->assistance_id);
    }

    public function asignarTecnico()
    {
        $tarea = Tarea::create([
            'technician_id' => $this->tecnico,
            'assistance_id' => $this->assistance_id,
            'status' => 0, // significa que el trabajo esta empezando
        ]);

        $tarea->save();

        $this->assistance->status = 2;
        $this->assistance->save();

        $this->alert('success', 'Tecnico asignado', [
            'position' => 'center',
            'showConfirmButton' => true,
            'toast' => false,
            'onConfirmed' => 'confirmed'
        ]);

        // NOTIFICAMOS AL CLIENTE
        if ($this->assistance->client && $this->assistance->client->user) {
            $client = $this->assistance->client->user;
            Notification::send($client, new MecanicoAsignado($this->assistance));
        }

        // NOTIFICAMOS AL TECNICO
        if ($tarea->technician) {
            $user = $tarea->technician->user;
            Notification::send($user, new NuevaTarea());
        }
        //$this->reset('tecnico');

        // Tenemos que registrar el tiempo de la respuesta ganada
        // desde la fecha u hora de la tarea creada + los 20 minutos
    }
}
