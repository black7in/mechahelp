<?php

namespace App\Livewire\Tech;

use App\Models\Tarea;
use App\Notifications\MecanicoLLega;
use App\Notifications\NuevoStrike;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Notification;

class TaskIndex extends Component
{
    use LivewireAlert;

    public function getListeners()
    {
        return [
            "echo-notification:App.Models.User." . auth()->user()->id . ',NuevaTarea' => "render", // evento de mecanico asignado
        ];
    }
    public function render()
    {
        $tasks = Auth::user()->technician->tareas;
        //$assistances = $tasks->assistances;

        //d($tasks);
        return view('livewire.tech.task-index', compact('tasks'));
    }

    public function emitirAsistencia($id)
    {

        $this->dispatch('cargarAsistenciaDetalleParaTecnico', $id);
    }

    public function marcarLlegada($id)
    {
        // obtener assistance dede task
        $task = Tarea::find($id);

        $assistance = $task->assistance;

        $assistance->status = 3;  // Estado en proceso significa que el mecanico ya llegó
        $assistance->save();

        $this->alert('success', 'Marcado con éxito', [
            'position' => 'center',
            'showConfirmButton' => true,
            'toast' => false,
            'onConfirmed' => 'confirmed'
        ]);

        //Notificar al cliente que su mecanico llegó
        $client = $assistance->client->user;
        Notification::send($client, new MecanicoLLega($assistance));

        // Hora en que se notifico al mecanico
        $fechaPartida = $task->created_at;

        $fechaActual = Carbon::now();

        $tiempoLlegada = $fechaActual->diffInMinutes($fechaPartida);

        // Obtener el tiempo acordado en minutos
        $ofertaGanadora = $assistance->respuestas->where('status', 1)->first();
        $tiempoAcordado = $ofertaGanadora->time + config('app.tolerancia');


        if( $tiempoLlegada > $tiempoAcordado){
            // agregar y notificar al taller que tiene  +1 strike
            $assistance->workshop->agregarStrike();
            Notification::send($assistance->workshop->user, new NuevoStrike());
        }
    }
}
