<?php

namespace App\Livewire\Workshop;

use App\Models\Assistance;
use App\Models\Respuesta;
use App\Notifications\NuevaRespuesta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Notification;
class ResponderSolicitud extends Component
{
    use LivewireAlert;
    public $id;

    public $title;
    public $description;

    public $time;

    public $price;

    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        $assistance = Assistance::find($this->id);
        $isResp = Respuesta::where('assistance_id', $this->id)
            ->where('workshop_id', Auth::user()->workshop->id)
            ->get();

        //dd($isResp);
        return view('livewire.workshop.responder-solicitud', compact('assistance', 'isResp'));
    }

    public function create()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'time' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $workshopId = Auth::user()->workshop->id;

        $respuesta = new Respuesta([
            'assistance_id'=> $this->id,
            'workshop_id'=> $workshopId,
            'title'=> $this->title,
            'description'=> $this->description,
            'time'=> $this->time,
            'price'=> $this->price,
            'status' => 0
        ]);

        $respuesta->save();

        $this->reset(['title', 'description', 'time', 'price']);

        $this->alert('success', 'Cotización enviada', [
            'position' => 'center',
            'showConfirmButton' => true,
            'toast' => false,
            'onConfirmed' => 'confirmed'
        ]);

        $assistance = Assistance::find($this->id);

        $user = $assistance->client->user;
        
        // Aqui debemos notificar al cliente  que le llego uan notificacion
        Notification::send($user, new NuevaRespuesta($respuesta));
    }
}
