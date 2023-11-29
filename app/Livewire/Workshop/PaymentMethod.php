<?php

namespace App\Livewire\Workshop;

use Livewire\Component;


class PaymentMethod extends Component
{

    public $count = 0;

    public function contar(){
        $this->count++;
    }
    public function render()
    {
        return view('livewire.workshop.payment-method', [
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
