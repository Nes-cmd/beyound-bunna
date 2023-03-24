<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ShippmentAdress;
use App\Models\CountryCity;
use DB;
use App\Helper\DhlService;
use App\Helper\UpsService;
use App\Models\Country;

class ShippmentComponent extends Component
{
    protected $listeners = ['countrySelected', 'citySelected'];
    public $newAdress = false;
    public $adress = ['country_id' => null, 'city_id' => null, 'posta_number' => null, 'postal_code' => null, 'addressLine1' => null, 'addressLine2' => null, 'addressLine3' => null];
    public $shippment = ['shippment_method' => null, 'shippment_adress_id' => null];
    public $countries;
    public $cities;
    public $country_code = null;
    public $savedAdress = null;
    public $shippmentMethod = null;
    public $shippmentPrice;
    protected $rules = [
        'adress.fullname' => 'required|string',
        'adress.phone' => 'required|numeric',
        'adress.email' => 'required|string',
        'adress.country_id' => 'required',
        'adress.city_id' => 'required|numeric',
        'adress.province_name' => 'nullable',
        'adress.posta_number' => 'required',
        'adress.postal_code' => 'required',
        'adress.addressLine1' => 'required',
        'adress.addressLine2' => 'nullable',
        'adress.addressLine3' => 'nullable',
    ];
    public function mount()
    {
        $this->countries = Country::all()->sortBy('name');
        $this->findSavedAdresses();
        $this->adress['fullname'] = auth()->user()->first_name.' '.auth()->user()->last_name;
        $this->adress['phone'] = auth()->user()->phone;
        $this->adress['email'] = auth()->user()->email;
    }
    public function updatedShippmentShippmentAdressId()
    {
        $this->adress = ShippmentAdress::where('id', $this->shippment['shippment_adress_id'])->first();
        $this->setDisplayShippmet();
    }
    public function countrySelected($id)
    {
        $this->adress['country_id'] = $id;
        $this->findCities($id);
        $this->setDisplayShippmet();
    }
    public function citySelected($id)
    {
        $this->adress['city_id'] = $id;  
    }
    public function setDisplayShippmet()
    {
        $this->setUpsShippment($this->adress);
        // $this->setDhlShippment($this->adress);
    }
    public function setUpsShippment($adress)
    {
        $upsService = new UpsService();
        $productSize = cartWeight();
        $country = $this->countries->where('id', $adress['country_id'])->first();
        if($country != null){
            $zoneId = $country->zone_id;
            $this->shippmentMethod['UPS'] = $upsService->getRate($zoneId, $productSize, 'non_document');
        }
    }
    public function setDhlShippment($adress)
    {
        $dhlService = new DhlService;
        $dhlProduct = $dhlService->getRate(['country_code' => $this->countries[$adress['country_id']]['country_code'], 'postal_code' =>$adress['postal_code']]);
        if($dhlProduct->has('products')){
            $dhlProduct = objectToArray($dhlProduct['products']);
            foreach($dhlProduct as $product){
                $this->shippmentMethod['DHL'] = ['shippmentName' => $product['productName'], 'price' => $product['totalPrice'][0]['price'], 'currency' => $product['totalPrice'][0]['priceCurrency'],'estimatedTime' => $product['deliveryCapabilities']['estimatedDeliveryDateAndTime']];
            }
        }
    }
    public function findSavedAdresses()
    {
        $this->savedAdress = ShippmentAdress::with('country', 'city')->where('user_id', auth()->user()->id )->get();
        // dd($this->savedAdress);  
        if(!count($this->savedAdress)){
            $this->newAdress = true;
        }
    }
    public function continue()
    {
        $adress = null;
        if($this->newAdress){
            $this->validate();
            $adress = ShippmentAdress::create([
                'user_id' => auth()->user()->id,
                'phone' => $this->adress['phone'],
                'country_id' => $this->adress['country_id'],
                'city_id' => $this->adress['city_id'],
                'posta_number' => $this->adress['posta_number'],
                'postal_code' => $this->adress['postal_code'],
                'fullname' => $this->adress['fullname'],
                'email' => $this->adress['email'],
                'province_name' => $this->adress['province_name'],
                'addressLine1' => $this->adress['addressLine1'],
                'addressLine2' => $this->adress['addressLine2'],
                'addressLine3' => $this->adress['addressLine3'],
            ]);
            $this->shippment['shippment_adress_id'] = $adress->id;
            $this->findSavedAdresses();
        }
        else{
            $this->validate([
                'shippment.shippment_adress_id' => 'required',
                'shippment.shippment_method' => 'required'
            ]);
        }
        $this->adress['country_code'] = $this->countries->where('id', $this->adress['country_id'])->first()->country_code;
        $this->adress['city_name'] = CountryCity::where('id', $this->adress['city_id'])->first()->name;
        $selectedShippment = $this->shippmentMethod[$this->shippment['shippment_method']];
        $selectedShippment['shippment_adress_id'] =  $this->shippment['shippment_adress_id'];
        $selectedShippment['ShippmentTag'] = $this->shippment['shippment_method'];
        $this->adress['shippmentMethod'] = $selectedShippment;
        // dd($this->adress);
        $this->emit('shippmentAdded', $this->adress);
    }
    
    public function findCities($country_id)
    {
        $this->cities = CountryCity::where('country_id', $country_id)->get()->sortBy('name');   
        
        $this->country_code = $this->countries->where('id', $country_id)->first()->dial_code;

    }
    public function render()
    {
        return view('livewire.shippment-component');
    }
}
