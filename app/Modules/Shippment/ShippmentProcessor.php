<?php
namespace App\Modules\Shippment;
class ShippmentProcessor{

    protected $selectedShippment;
    public function getAvailableShippmentMethods()
    {
        return [
            'dhl-express' => false,
            'ups' => false,
            'warka' => true,
        ];
    }

    public function getShipmentPrice($destinationAdress, $from = null)
    {
        $methods = $this->getAvailableShippmentMethods();
        $rates = [];
        if($methods['dhl-express']){
           $dhlShippment = new DhlSippment;
           $products = $dhlShippment->getDhlProducts($destinationAdress);
           foreach($products as $product) array_push($rates, $product);
        }
        if($methods['ups']){
            $upsService = new UpsService;
            $rate = $upsService->setUpsShippment($destinationAdress);
            if($rate['available']) array_push($rates, $rate);
        }
        if($methods['warka']){
            array_push($rates, ['shippmentName' => 'Manual delivery system', 'price' => '0', 'currency' => 'USD', 'estimatedTime' => 'unknown']);
        }
        return $rates;
    }
}