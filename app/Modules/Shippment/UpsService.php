<?php 
namespace App\Modules\Shippment;

use App\Models\ShippmentRate;

class UpsService {
    public function getRate($zoneId, $product_size, $product_type)
    {
        $size = $this->floorSize($product_size);
        $rate = ShippmentRate::where('product_type', $product_type)
                                ->where('zone_id', $zoneId)
                                ->get();
        if($rate){
            $downed = 0;
            $myRate = $rate->where('size', $size)->first();
            while($size > 0 && $myRate == null){
                $size = $this->floorSize($size/2);
                $myRate = $rate->where('size', $size)->first();
                $downed += 1;
            }
            $price = $myRate->price * pow(2,$downed);
            if(!$myRate){
                return ['available' => false, 'message' => 'Price for this size is not seted'];
            }
            return ['available' => true,'shippmentName' => 'UPS Shippment', 'price' => $price, 'currency' => 'USD', 'estimatedTime' => 'unknown', 'message' => 'success'];
        }
        return ['available' => false, 'message' => 'unsatisfied condition to calculate price'];
    }

    public function setUpsShippment($destinationAdress)
    {
        $productSize = cartWeight();
        $country = $destinationAdress->country;

        if($country != null){
            $zoneId = $country->zone_id;
            return $this->getRate($zoneId, $productSize, 'non_document');
        }
        return ['available' => false, 'message' => 'Country not found'];
    }

    public function floorSize($size){
        $floor = floor($size);
        if($size - $floor == 0 || $size - $floor == 0.5) $floored = $size;
        elseif($size - $floor > 0.5) $floored = ceil($size);
        else $floored = $floor + 0.5;
        return $floored;
    }
}
?>