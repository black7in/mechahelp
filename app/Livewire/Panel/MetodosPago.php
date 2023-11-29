<?php

namespace App\Livewire\Panel;

use Livewire\Component;

class MetodosPago extends Component
{
     public function render()
    {
        return view('livewire.panel.metodos-pago', [
            'intent' => auth()->user()->createSetupIntent(),
            'paymentMethods' => auth()->user()->paymentMethods(),
            'invoices' => auth()->user()->invoices()
        ]);
    }

    public function addPaymentMethod($paymentMethod)
    {
        auth()->user()->addPaymentMethod($paymentMethod);

        if (!auth()->user()->hasDefaultPaymentMethod()) {
            auth()->user()->updateDefaultPaymentMethod($paymentMethod);
        }
    }

    public function defaultPaymentMethod($paymentMethod)
    {
        auth()->user()->updateDefaultPaymentMethod($paymentMethod);
    }

    public function deletePaymentMethod($paymentMethod)
    {
        auth()->user()->deletePaymentMethod($paymentMethod);
    }

    public function getDefaultPaymentMethodProperty($paymentMethod)
    {
        return auth()->user()->getDefaultPaymentMethod();
    }

}
