<?php

namespace App\Livewire\Workshop;

use App\Models\Technician;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class TecnicosCreate extends Component
{
    use LivewireAlert;

    public $first_name;

    public $last_name;

    public $email;

    public $password;

    public $phone;
    public $speciality;

    public function render()
    {
        return view('livewire.workshop.tecnicos-create');
    }

    public function create()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8',
            'phone' => 'required|numeric',
            'speciality' => 'required|string|max:255',
        ]);

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'type' => 2,
        ]);
        $user->assignRole('Technician');

        Technician::create([
            'user_id' => $user->id,
            'workshop_id' => Auth::user()->workshop->id,
            'phone' => $this->phone,
            'speciality' => $this->speciality,
            'status' => 0
        ]);

        $this->reset(['first_name', 'last_name', 'email', 'phone', 'speciality', 'password']);
        $this->dispatch('render');

        $this->alert('success', 'Tecnico creado con exito', [
            'position' => 'center',
            'showConfirmButton' => true,
            'toast' => false,
            'onConfirmed' => 'confirmed'
        ]);

    }
}
