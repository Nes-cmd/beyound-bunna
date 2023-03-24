<?php 
namespace App\Modules\Payment;

class PaymentProcessor{

    protected $selectedMethod;
    protected $payerData;
    protected $billingAdress;
    protected $cardProcessor;

    public function __construct($selectedMethod = null, $payerData = null, $billingAdress = null)
    {
        $this->selectedMethod = $selectedMethod;
        $this->payerData = $payerData;
        $this->billingAdress = $billingAdress;
        $this->cardProcessor = 'stripe'; // stripe or paypal
    }
    public function getAvailabePaymentMethods()
    {
        // cash-on-delivery || cod 
        return ['paypal' => true, 'cards' => true, 'cash-on-delivery' => true];
    }
   
    public function setFields($payerData, $billingAdress)
    {
        $this->payerData = $payerData;
        $this->billingAdress = $billingAdress;
    }
    public function isSelectedPayPal()
    {
        return $this->selectedMethod ==  'paypal';
    }
    public function isSelectedCards()
    {
        return $this->selectedMethod ==  'cards';
    }
    public function isSelectedCashOnDelivery()
    {
        return $this->selectedMethod == 'cash-on-delivery';
    }
    public function makePayment()
    {
        $status = [
            'paymentCompleted' => false,
            'message' => 'Sorry, we can\'t process the order. Please try again later,',
            'paymentMethod' => $this->selectedMethod,
        ];


        if($this->isSelectedPayPal()){
            $paypalApi = new PaypalApi();
            $access = $paypalApi->getAccess();
            if($access != null){
                $order = $paypalApi->createOrder($access);
                if(isset($order->id) && $order->id != null){
                    $token = ['access' => $access, 'id' => $order->id];
                    session()->put(['tokens'=> $token]);
                    
                    foreach ($order->links as $link) {
                        if($link->rel == 'approve'){
                            return redirect()->away($link->href);
                        }
                    }
                }
                else $status['message'] = 'Error while creating payment order';
            }
            else $status['message'] = 'Unkown eror, unable to get access token';
    
            return $status;  
        }
        elseif($this->isSelectedCards()){
            if($this->cardProcessor == 'stripe'){
                $stripeApi = new StripeApi;
                $cardpayment = $stripeApi->paymentProcessor($this->payerData['data'],$this->billingAdress );
            
                if( $cardpayment['status'] == 'succeeded'){
                    $preparedData = $stripeApi->prepareResponse($cardpayment);
                    $status['paymentCompleted'] = true;
                    $status['preparedData'] = $preparedData;
                    return $status;
                }
                else{
                    $status['message'] = $cardpayment['message'];
                    return $status;
                }
            }
            else{
                $paypalApi = new PaypalApi();
                $access = $paypalApi->getAccess();
                if($access != null){
                    $order = $paypalApi->createOrder($access);
                    if(isset($order->id) && $order->id != null){
                        $token = ['access' => $access, 'id' => $order->id];
                        
                        $cardpayment = $paypalApi->paypalCardPrecessor($access,$order->id,$this->payerData['data'],$this->billingAdress );
                        if(isset($cardpayment->id)){
                            dd($cardpayment, 'compated???');
                            // $status['paymentCompleted'] = true;
                            // $status['preparedData'] = $preparedData;
                        }
                        else{
                            $status['message'] = $cardpayment->message;
                            return $status;
                        }
                    }
                    else $status['message'] = 'Error while creating payment order';
                }
                else $status['message'] = 'Unkown eror, unable to get access token';
            }
        }
        elseif($this->isSelectedCashOnDelivery()){
            $CashonDelivery = new CashonDelivery();
            $status['paymentCompleted'] = true;
            $status['preparedData'] = $CashonDelivery->prepareResponse();
            return $status;
        }
        else{
            $status['message'] = 'Unknown payment method';
            return $status;
        }
    }
}