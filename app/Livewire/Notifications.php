<?php

namespace App\Livewire;

use Livewire\Component;

class Notifications extends Component
{

    // Escuca estos eventos, si quiero que otro componente escuche estos eventos tengo que poenerlo
    public function getListeners()
    {
        return [
            "echo-notification:App.Models.User." . auth()->user()->id . ',NuevaSolicitud' => "render", //Evento de nueva solicitud
            "echo-notification:App.Models.User." . auth()->user()->id . ',NuevaRespuesta' => "render", // Evento de neuva respuesta
            "echo-notification:App.Models.User." . auth()->user()->id . ',RespuestaAceptada' => "render", // Eevento de respeusta aceptada
            "echo-notification:App.Models.User." . auth()->user()->id . ',MecanicoAsignado' => "render", // evento de mecanico asignado
            "echo-notification:App.Models.User." . auth()->user()->id . ',NuevaTarea' => "render", // evento de mecanico asignado
            "echo-notification:App.Models.User." . auth()->user()->id . ',MecanicoLLega' => "render", // notif pa el user mecanico ha llegado
            "echo-notification:App.Models.User." . auth()->user()->id . ',NuevoStrike' => "render", // notif pa el user mecanico ha llegado
            "echo-notification:App.Models.User." . auth()->user()->id . ',ReporteRecibido' => "render", // notif pa el user mecanico ha llegado
            "echo-notification:App.Models.User." . auth()->user()->id . ',PagoSolicitado' => "render", // notif pa el user mecanico ha llegado
            "echo-notification:App.Models.User." . auth()->user()->id . ',PagoRealizado' => "render", // notif pa el user mecanico ha llegado
        ];

    }
    public function marcarComoLeido($id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();

        if ($notification) {
            if (!$notification->read_at) {
                $notification->markAsRead();
            }

            if ($notification->type == 'App\Notifications\NuevaSolicitud') {
                return redirect('workshop/assistance/prewview/' . $notification->data['assistance_id']);
            } elseif ($notification->type == 'App\Notifications\NuevaRespuesta') {
                return redirect('panel/assistance/requests/' . $notification->data['respuesta_id']);
            } elseif ($notification->type == 'App\Notifications\RespuestaAceptada') {
                // redirigir al panel de workshop/assistances/show/1
                return redirect('workshop/assistance');
            } elseif ($notification->type == 'App\Notifications\MecanicoAsignado') {
                return redirect('panel/assistance/show/' . $notification->data['assistance_id']);
            } elseif ($notification->type == 'App\Notifications\NuevaTarea') {
                return redirect('workshop/tasks');
            } elseif ($notification->type == 'App\Notifications\MecanicoLLega') {
                return redirect('workshop/assistance/show/' . $notification->data['assistance_id']);
            } elseif ($notification->type == 'App\Notifications\NuevoStrike') {
                return redirect('workshop/profile');
            } elseif ($notification->type == 'App\Notifications\ReporteRecibido') {
                return redirect('workshop/assistance');
            } elseif ($notification->type == 'App\Notifications\PagoSolicitado') {
                return redirect('panel/assistance/paid/' . $notification->data['assistance_id']);
            } elseif ($notification->type == 'App\Notifications\PagoRealizado') {
                return redirect('workshop/assistance');
            }
        }
    }
    public function render()
    {
        return view('livewire.notifications');
    }
}
