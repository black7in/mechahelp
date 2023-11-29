<?php

namespace App\Livewire;

use App\Models\Assistance;
use App\Notifications\PagoRealizado;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Notification;

class PagarServicio extends Component
{
    use LivewireAlert;
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $assistance = Assistance::find($this->id);
        return view('livewire.pagar-servicio', [
            'intent' => auth()->user()->createSetupIntent(),
            'paymentMethods' => auth()->user()->paymentMethods(),
            'invoices' => auth()->user()->invoices(),
            'assistance' => $assistance
        ]);
    }

    public function confirmed(){
        return redirect()->route('wallet');
    }
    public function pagar()
    {
        $assistance = Assistance::find($this->id);
        auth()->user()->charge($assistance->price, $this->defaultPaymentMethod->id);

        Notification::send($assistance->workshop->user, new PagoRealizado());

        $this->alert('success', 'Pago Realizado', [
            'position' => 'center',
            'showConfirmButton' => true,
            'toast' => false,
            'onConfirmed' => 'confirmed'
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

    public function getDefaultPaymentMethodProperty()
    {
        return auth()->user()->defaultPaymentMethod();
    }



}
