<?php 
namespace App\Helper;

use App\Models\ShippmentRate;

class UpsService {
    public function getRate($zoneId, $product_size, $product_type)
    {
        $size = floorSize($product_size);
        $rate = ShippmentRate::where('product_type', $product_type)
                                ->where('zone_id', $zoneId)
                                ->get();
        if($rate){
            $downed = 0;
            $myRate = $rate->where('size', $size)->first();
            // dd($myRate);
            while($size > 0 && $myRate == null){
                $size = floorSize($size/2);
                $myRate = $rate->where('size', $size)->first();
                $downed += 1;
            }
            $price = $myRate->price * pow(2,$downed);
            if(!$myRate){
                dd('Price for this size is not seted');
            }
            return ['shippmentName' => 'UPS Delivery', 'price' => $price, 'currency' => 'USD', 'estimatedTime' => 'unknown'];
        }
        dd('unsatisfied condition to calculate price');

    }
}
function floorSize($size){
    $floor = floor($size);
    if($size - $floor == 0 || $size - $floor == 0.5){
        $floored = $size;
    }
    elseif($size - $floor > 0.5){
        $floored = ceil($size);
    }
    else {
        $floored = $floor + 0.5;
    }
    return $floored;
}
?>