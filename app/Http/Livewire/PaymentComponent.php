<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
class PaymentComponent extends Component
{
    public $shippmentAdress;
    public $payment = ['method' => null, 'data' => null];
    public $billadress = 0;
    public function mount($shippmentAdress = null)
    {
        // Omen i7 10th graphics 6gb 1650
        // dd( $shippmentAdress );
        $this->shippmentAdress = $shippmentAdress;
        $this->emit('makeAlert', ['type' => 'danger', 'message' => 'Fuck']);
    }
    public function continue()
    {
        if(isset($this->payment['method']) && $this->payment['method'] == 'cards'){
            $this->validate([
                'payment.data.nameonCard' => 'required',
                'payment.data.cardNumber' => 'required',
                'payment.data.expYear' => 'required',
                'payment.data.expMonth' => 'required',
                'payment.data.cvv' => 'required',
            ]);
        }
        else {
            $this->validate(['payment.method' => 'required']);
        }

        $this->emit('paymentAdded', $this->payment);

    }
    public function calcTotal()
    {
        return $this->shippmentAdress['shippmentMethod']['price'] + cartTotal();
    }
    public function render()
    {
        return view('livewire.payment-component');
    }
}
