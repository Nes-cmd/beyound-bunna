<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Helper\PaypalApi;
use App\Helper\StripeApi;

class ReviewComponent extends Component
{
    public $carts;
    public $paymentDetail;
    public $shippmentAdress;
    public function mount($shippmentAdress = null, $paymentDetail = null)
    {
        $this->emit('makeAlert', ['type' => 'danger', 'message' => 'Fuck']);
        $this->carts = session()->get('cart');  
        $this->shippmentAdress = $shippmentAdress;
        $this->paymentDetail = $paymentDetail;
    }
    public function placeOrder()
    {
        $payment = $this->paymentDetail;
        $shipp = $this->shippmentAdress;

        if($payment['method'] == 'cards'){
            $stripeApi = new StripeApi;
            $cardpayment = $stripeApi->paymentProcessor($payment['data'],$shipp );
            // $cardpayment = $paypalApi->cardPrecessor($access,$order->id,$payment['data'],$shipp );
            if( $cardpayment['status'] == 'succeeded'){
                session()->put('cardTransactionData', $cardpayment);
                return redirect()->route('card.success');
            }
            else{
                $this->emit('makeAlert', ['type' => 'danger', 'message' => $cardpayment['message']]);
                // dd($cardpayment);
            }
        }
        else{
            $paypalApi = new PaypalApi();
            $access = $paypalApi->getAccess();
            if($access != null){
                $order = $paypalApi->createOrder($access);
                if(isset($order->id) && $order->id != null){
                    $token = ['access' => $access, 'id' => $order->id];
                    session()->put(['tokens'=> $token]);
                    
                    $shipp['paymentMethod'] = $payment['method']; 
                    session()->put(['shippment' => $shipp]);
                    
                    foreach ($order->links as $link) {
                        if($link->rel == 'approve'){
                            return redirect()->away($link->href);
                        }
                    }
                }
                else {
                    $this->emit('makeAlert', ['type' => 'danger', 'message' => 'Error while creating payment order']);
                }
            }
            else{
                $this->emit('makeAlert', ['type' => 'danger', 'message' => 'Unkown eror, unable to get access token']);
            }   
        }
    }
    
    public function render()
    {
        return view('livewire.review-component');
    }
}
