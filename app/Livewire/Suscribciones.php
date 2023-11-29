<?php

namespace App\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Suscribciones extends Component
{

    use LivewireAlert;

    public function getListeners()
    {
        return [
            'confirmed'
        ];
    }

    public function render()
    {
        return view('livewire.suscribciones');
    }


    public function confirmed(){
        return redirect()->route('w-wallet');
    }
    public function getDefaultPaymentMethodProperty()
    {
        return auth()->user()->defaultPaymentMethod();
    }
    public function newSubscription($plan)
    {
        // Verificar si el usuario está autenticado
        if (auth()->check()) {
            if (!auth()->user()->hasDefaultPaymentMethod()) {
                $this->alert('error', 'Debes registrar un metodo de pago', [
                    'position' => 'center',
                    'showConfirmButton' => true,
                    'toast' => false,
                    'onConfirmed' => 'confirmed'
                ]);
                return;
            }

            auth()->user()->newSubscription('Suscripción Talleres', $plan)->create($this->defaultPaymentMethod->id);

            $this->alert('success', 'Te suscribiste a un nuevo plan', [
                'position' => 'center',
                'showConfirmButton' => true,
                'toast' => false,
                'onConfirmed' => 'confirmed'
            ]);

            return redirect()->route('w-assistance');
        } else {
            return redirect()->route('login');
        }
    }

    public function defaultPaymentMethod($paymentMethod)
    {
        auth()->user()->updateDefaultPaymentMethod($paymentMethod);
    }
}
