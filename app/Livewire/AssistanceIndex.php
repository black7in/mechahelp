<?php

namespace App\Livewire;

use App\Models\Media;
use App\Models\User;
use App\Notifications\NuevaSolicitud;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Assistance;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Notification;

class AssistanceIndex extends Component
{

    use LivewireAlert;
    use WithFileUploads;
    public $title;
    public $description;
    public $vehicle;

    public $photos = [];

    public $photoKey;

    public $audioFile;
    public $audioKey;

    public $lat;

    public $lng;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'vehicle' => 'required',
        'photos.*' => 'required|image|max:1024',
        'audioFile' => 'required',
        'lat' => 'required|numeric',
        'lng' => 'required|numeric',
    ];
    
    public function render()
    {
        $vehicles = Auth::user()->client->vehicles;
        $assistances =  Auth::user()->client->assistances;
        //dd($vehicles);   
        return view('livewire.assistance-index', compact('vehicles', 'assistances'));
    }

    public function resetFiled()
    {
        $this->reset(["title", 'description', 'vehicle', 'photos', 'audioFile']);
        $this->photoKey = rand();
        $this->audioKey = rand();
    }

    public function setLng($lng){
        $this->lng = $lng;
    }

    public function setLat( $lat ){
        $this->lat = $lat;
    }

    public function create()
    {
        $this->validate();

        $newAssistance = Assistance::create([
            'title' => $this->title,
            'description' => $this->description,
            'vehicle_id' => $this->vehicle,
            'client_id' => Auth::user()->client->id,
            'workshop_id' => null,
            'lat' => $this->lat,
            'lng'=> $this->lng,
            'status'=> 0, // En espera
            'price' => 0
        ]);

        foreach ($this->photos as $image) {
            $imagePath = Storage::put('assistances', $image);

            // Media 0 images, 1 audio
            Media::create([
                'assistance_id' => $newAssistance->id,
                'type' => 0,
                'path' => $imagePath
            ]);
        }

        $audioPath = Storage::put('audio', $this->audioFile);

        Media::create([
            'assistance_id' => $newAssistance->id,
            'type' => 1,
            'path' => $audioPath,
        ]);

        $this->resetFiled();

        $this->alert('success', 'Solicitud de asistencia creada', [
            'position' => 'center',
            'showConfirmButton' => true,
            'toast' => false,
            'onConfirmed' => 'confirmed'
        ]);


        // Enviar a todos los workshops , liuego hay que restringir a los inhabilitados
        $users = User::whereHas('workshop')->get();

        Notification::send($users, new NuevaSolicitud($newAssistance));
    }

    public function test()
    {
        $this->alert('success', 'Solicitud de asistencia creada', [
            'position' => 'center',
            'showConfirmButton' => true,
            'toast'=> false,
            'onConfirmed' => 'confirmed'
        ]);
    }
}
