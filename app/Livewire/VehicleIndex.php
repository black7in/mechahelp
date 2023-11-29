<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class VehicleIndex extends Component
{
    use LivewireAlert;

    public $marca;
    public $placa;
    public $modelo;
    public $año;

    public $count = 0;

    protected $listeners = [
        'confirmed'
    ];

    public function increment()
    {
        $this->count++;
    }

    public function resetFiled()
    {
        $this->reset(["marca", 'placa', 'modelo', 'año']);
    }

    public function render()
    {
        $vehicles = Auth::user()->client->vehicles;
        return view('livewire.vehicle-index', compact('vehicles'));
    }

    public function create()
    {
        $this->validate([
            'marca' => 'required',
            'modelo' => 'required',
        ]);

        Vehicle::create([
            'marca' => $this->marca,
            'placa' => $this->placa,
            'modelo' => $this->modelo,
            'año' => $this->año,
            'client_id' => Auth::user()->client->id
        ]);

        $this->resetFiled();

        /*$this->alert('success', 'Vehiculo agregado con éxito', [
            'position' => 'center',
            'showConfirmButton' => true,
            'toast' => false,
            'onConfirmed' => 'confirmed'
        ]);*/
    }

    public function deleted($id)
    {

    }

    public function confirmed()
    {
        // Do something
    }
}
