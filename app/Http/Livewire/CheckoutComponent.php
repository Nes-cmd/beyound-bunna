<?php

namespace App\Http\Livewire;

use App\Http\Controllers\OrderController;
use App\Models\Country;
use App\Models\CountryCity;
use App\Models\ShippmentAdress;
use App\Modules\Payment\PaymentProcessor;
use App\Modules\Shippment\ShippmentProcessor;
use Livewire\Component;

class CheckoutComponent extends Component
{
    protected $listeners = ['countrySelected', 'citySelected'];
    public $carts;
    public $adress = ['country_id' => null, 'city_id' => null, 'postal_code' => null, 'addressLine1' => null];
    public $shippment = ['shippment_method' => null, 'shippment_adress_id' => null];
    public $shippmentAdress = null;
    public $countries;
    public $cities;
    public $shippmentMethod = null; 
    public $shippmentPrice;

    public $payment = ['method' => null];
    public $paymentData = [];
    public $paymentMethods;
    protected $rules = [
        'adress.country_id' => 'required',
        'adress.city_id' => 'required',
        'adress.phone' => 'required',
        'adress.email' => 'required',
        'adress.fullname' => 'required',
        'adress.postal_code' => 'required',
        'adress.addressLine1' => 'required',
    ];

    public function mount(PaymentProcessor $paymentMethods)
    {
        $this->carts = session()->get('cart');  
        $this->countries = Country::all()->sortBy('name');
        $this->paymentMethods = $paymentMethods->getAvailabePaymentMethods();
    }
    public function calcTotal()
    {
        return $this->shippmentAdress['shippmentMethod']['price'] + cartTotal();
    }
    public function findCities($country_id)
    {
        $this->cities = CountryCity::where('country_id', $country_id)->get()->sortBy('name');
    }
    public function placeOrder()
    {
        $this->validate();
        $this->validate(['shippment.shippment_method' => 'required', 'payment.method' => 'required']);
        $payment = $this->payment;
        
        if($payment['method'] == 'cards'){
            $this->validate([
                'payment.data.nameonCard' => 'required',
                'payment.data.cardNumber' => 'required',
                'payment.data.expYear' => 'required',
                'payment.data.expMonth' => 'required',
                'payment.data.cvv' => 'required',
            ]);
        }
        $payment = $this->payment;
        $adress = ShippmentAdress::create([
            'user_id' => auth()->user()->id,
            'phone' => $this->adress['phone'],
            'country_id' => $this->adress['country_id'],
            'city_id' => $this->adress['city_id'],
            'postal_code' => $this->adress['postal_code'],
            'fullname' => $this->adress['fullname'],
            'email' => $this->adress['email'],
            'addressLine1' => $this->adress['addressLine1'], 
        ]);


        $shipp['shippment_adress_id'] = $adress->id;
        $shipp['shippmentMethod'] = ['shippment_adress_id' => $adress->id];
        $shipp['paymentMethod'] = $payment['method'];
        session()->put('shippment', $shipp);
        
        $paymentProcessor = new PaymentProcessor($payment['method']);
        $paymentProcessor->setFields($payment, $adress);

        $status = $paymentProcessor->makePayment();
        if($status instanceof \Livewire\Redirector){
            return $status;
        }
        if($status['paymentCompleted']){
            $orderer = new OrderController;
            $orderId = $orderer->placeOrder($status['preparedData']);
            $this->emit('makeAlert', ['type' => 'success', 'message' => 'Your order placed successfully']);
            return redirect()->route('shop.confirmation', $orderId);
        }
        else{
            $this->emit('makeAlert', ['type' => 'danger', 'message' => $status['message']]);
        }
    }
    public function countrySelected($id)
    {
        $this->adress['country_id'] = $id;
        $this->findCities($id);
    }
    public function citySelected($id)
    {
        $this->adress['city_id'] = $id;
        $this->setDisplayShippmet();
    }

    public function setDisplayShippmet()
    {
        $shippmentProcessor = new ShippmentProcessor;
        $destinationAdress = CountryCity::with('country')->where('id', $this->adress['city_id'])->first();
        $this->shippmentMethod = $shippmentProcessor->getShipmentPrice($destinationAdress);
    }
    public function render()
    {
        return view('livewire.checkout-component')
                    ->layout('layouts.customer.app');
    }
}
